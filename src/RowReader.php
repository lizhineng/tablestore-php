<?php

namespace Dew\Tablestore;

use Dew\Tablestore\Cells\Tag;
use Dew\Tablestore\Exceptions\RowReaderException;

class RowReader
{
    /**
     * The code indicates parsing continue.
     */
    protected const CODE_CONTINUE = 0;

    /**
     * The cell class.
     *
     * @var class-string
     */
    protected string $cellClass;

    /**
     * The cell data.
     *
     * @var array<string, mixed>
     */
    protected array $cell;

    /**
     * The decoded data.
     *
     * @var array<mixed>|null
     */
    protected ?array $data = null;

    public function __construct(
        protected PlainbufferReader $buffer
    ) {
        //
    }

    /**
     * Decode the buffer header.
     */
    protected function readHeader(): int
    {
        if ($this->buffer->readLittleEndian32() !== Tag::HEADER) {
            throw new RowReaderException('Seems like not a row buffer.');
        }

        return self::CODE_CONTINUE;
    }

    /**
     * Decode tag buffer.
     */
    protected function readTag(): int
    {
        return $this->buffer->readChar();
    }

    /**
     * Decode primary key buffer.
     */
    protected function readPk(): int
    {
        $this->enterPrimaryKeySection();

        return self::CODE_CONTINUE;
    }

    /**
     * Decode attribute buffer.
     */
    protected function readAttr(): int
    {
        $this->enterAttributeSection();

        return self::CODE_CONTINUE;
    }

    /**
     * Mark entering the primary key section.
     */
    protected function enterPrimaryKeySection(): self
    {
        $this->cellClass = PrimaryKey::class;

        return $this;
    }

    /**
     * Mark entering the attribute section.
     */
    protected function enterAttributeSection(): self
    {
        $this->cellClass = Attribute::class;

        return $this;
    }

    /**
     * Decode cell buffer.
     */
    protected function readCell(): int
    {
        $this->cell = [];

        return self::CODE_CONTINUE;
    }

    /**
     * Decode cell name buffer.
     */
    protected function readCellName(): int
    {
        $this->cell['name'] = $this->buffer->read( // 2: read name by the size
            $this->buffer->readLittleEndian32()    // 1: get the name size
        );

        return self::CODE_CONTINUE;
    }

    /**
     * Decode cell value buffer.
     */
    protected function readCellValue(): int
    {
        $this->buffer->readLittleEndian32();

        $this->cell['class'] = $cellClass = $this->cellClass::classFromType($this->buffer->readChar());

        $this->cell['value'] = $cellClass::fromFormattedValue($this->buffer);

        return self::CODE_CONTINUE;
    }

    /**
     * Decode cell checksum buffer.
     */
    protected function readCellChecksum(): int
    {
        $this->data[$this->cell['name']] = new $this->cell['class'](
            $this->cell['name'], $this->cell['value']
        );

        $this->buffer->read(1);

        return self::CODE_CONTINUE;
    }

    /**
     * Handle the given tag.
     */
    protected function handle(int $tag): int
    {
        return match ($tag) {
            Tag::PK => $this->readPk(),
            Tag::ATTR => $this->readAttr(),
            Tag::CELL => $this->readCell(),
            Tag::CELL_NAME => $this->readCellName(),
            Tag::CELL_VALUE => $this->readCellValue(),
            Tag::CELL_CHECKSUM => $this->readCellChecksum(),
            0 => 1,
            default => throw new RowReaderException("Unexpected tag [$tag] occurred."),
        };
    }

    /**
     * Decode the row buffer.
     */
    protected function decode(): void
    {
        $this->data = [];

        $this->readHeader();

        while ($this->handle($this->readTag()) === self::CODE_CONTINUE) {
            //
        }
    }

    /**
     * Decode the buffer into an array.
     *
     * @return array<mixed>
     */
    public function toArray(): array
    {
        if ($this->data === null) {
            $this->decode();
        }

        return $this->data; // @phpstan-ignore-line
    }

    /**
     * The buffer reader.
     */
    public function getBuffer(): PlainbufferReader
    {
        return $this->buffer;
    }
}