<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: row_single.proto

namespace Protos;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>acs.tablestore.row.single.PutRowResponse</code>
 */
class PutRowResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>required .acs.tablestore.row.ConsumedCapacity consumed = 1;</code>
     */
    protected $consumed = null;
    /**
     * Generated from protobuf field <code>optional bytes row = 2;</code>
     */
    protected $row = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Protos\ConsumedCapacity $consumed
     *     @type string $row
     * }
     */
    public function __construct($data = NULL) {
        \Protos\Metadata\RowSingle::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>required .acs.tablestore.row.ConsumedCapacity consumed = 1;</code>
     * @return \Protos\ConsumedCapacity|null
     */
    public function getConsumed()
    {
        return $this->consumed;
    }

    public function hasConsumed()
    {
        return isset($this->consumed);
    }

    public function clearConsumed()
    {
        unset($this->consumed);
    }

    /**
     * Generated from protobuf field <code>required .acs.tablestore.row.ConsumedCapacity consumed = 1;</code>
     * @param \Protos\ConsumedCapacity $var
     * @return $this
     */
    public function setConsumed($var)
    {
        GPBUtil::checkMessage($var, \Protos\ConsumedCapacity::class);
        $this->consumed = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional bytes row = 2;</code>
     * @return string
     */
    public function getRow()
    {
        return isset($this->row) ? $this->row : '';
    }

    public function hasRow()
    {
        return isset($this->row);
    }

    public function clearRow()
    {
        unset($this->row);
    }

    /**
     * Generated from protobuf field <code>optional bytes row = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRow($var)
    {
        GPBUtil::checkString($var, False);
        $this->row = $var;

        return $this;
    }

}

