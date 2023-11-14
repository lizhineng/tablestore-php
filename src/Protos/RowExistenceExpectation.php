<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protos/tablestore/row_single.proto

namespace Protos;

use UnexpectedValueException;

/**
 * Protobuf type <code>acs.tablestore.row.single.RowExistenceExpectation</code>
 */
class RowExistenceExpectation
{
    /**
     * Generated from protobuf enum <code>IGNORE = 0;</code>
     */
    const IGNORE = 0;
    /**
     * Generated from protobuf enum <code>EXPECT_EXIST = 1;</code>
     */
    const EXPECT_EXIST = 1;
    /**
     * Generated from protobuf enum <code>EXPECT_NOT_EXIST = 2;</code>
     */
    const EXPECT_NOT_EXIST = 2;

    private static $valueToName = [
        self::IGNORE => 'IGNORE',
        self::EXPECT_EXIST => 'EXPECT_EXIST',
        self::EXPECT_NOT_EXIST => 'EXPECT_NOT_EXIST',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

