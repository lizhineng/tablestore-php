<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protos/tablestore/row_single.proto

namespace Protos;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>acs.tablestore.row.single.Condition</code>
 */
class Condition extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>required .acs.tablestore.row.single.RowExistenceExpectation row_existence = 1;</code>
     */
    protected $row_existence = null;
    /**
     * Generated from protobuf field <code>optional bytes column_condition = 2;</code>
     */
    protected $column_condition = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $row_existence
     *     @type string $column_condition
     * }
     */
    public function __construct($data = NULL) {
        \Protos\Metadata\RowSingle::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>required .acs.tablestore.row.single.RowExistenceExpectation row_existence = 1;</code>
     * @return int
     */
    public function getRowExistence()
    {
        return isset($this->row_existence) ? $this->row_existence : 0;
    }

    public function hasRowExistence()
    {
        return isset($this->row_existence);
    }

    public function clearRowExistence()
    {
        unset($this->row_existence);
    }

    /**
     * Generated from protobuf field <code>required .acs.tablestore.row.single.RowExistenceExpectation row_existence = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setRowExistence($var)
    {
        GPBUtil::checkEnum($var, \Protos\RowExistenceExpectation::class);
        $this->row_existence = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional bytes column_condition = 2;</code>
     * @return string
     */
    public function getColumnCondition()
    {
        return isset($this->column_condition) ? $this->column_condition : '';
    }

    public function hasColumnCondition()
    {
        return isset($this->column_condition);
    }

    public function clearColumnCondition()
    {
        unset($this->column_condition);
    }

    /**
     * Generated from protobuf field <code>optional bytes column_condition = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setColumnCondition($var)
    {
        GPBUtil::checkString($var, False);
        $this->column_condition = $var;

        return $this;
    }

}

