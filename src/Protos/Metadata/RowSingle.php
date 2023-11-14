<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: protos/tablestore/row_single.proto

namespace Protos\Metadata;

class RowSingle
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
"protos/tablestore/row_single.protoacs.tablestore.row.single"�
GetRowRequest

table_name (	
primary_key (
columns_to_get (	8

time_range (2$.acs.tablestore.row.single.TimeRange
max_versions (
filter (
start_column (	

end_column	 (	
token
 ("\\
GetRowResponse=
consumed (2+.acs.tablestore.row.single.ConsumedCapacity
row ("�
PutRowRequest

table_name (	
row (7
	condition (2$.acs.tablestore.row.single.Condition@
return_content (2(.acs.tablestore.row.single.ReturnContent"\\
PutRowResponse=
consumed (2+.acs.tablestore.row.single.ConsumedCapacity
row ("�
UpdateRowRequest

table_name (	

row_change (7
	condition (2$.acs.tablestore.row.single.Condition@
return_content (2(.acs.tablestore.row.single.ReturnContent"_
UpdateRowResponse=
consumed (2+.acs.tablestore.row.single.ConsumedCapacity
row ("�
DeleteRowRequest

table_name (	
primary_key (7
	condition (2$.acs.tablestore.row.single.Condition@
return_content (2(.acs.tablestore.row.single.ReturnContent"_
DeleteRowResponse=
consumed (2+.acs.tablestore.row.single.ConsumedCapacity
row ("H
	TimeRange

start_time (
end_time (
specific_time ("p
	ConditionI
row_existence (22.acs.tablestore.row.single.RowExistenceExpectation
column_condition ("h
ReturnContent:
return_type (2%.acs.tablestore.row.single.ReturnType
return_column_names (	"R
ConsumedCapacity>
capacity_unit (2\'.acs.tablestore.row.single.CapacityUnit"+
CapacityUnit
read (
write (*M
RowExistenceExpectation

IGNORE 
EXPECT_EXIST
EXPECT_NOT_EXIST*9

ReturnType
RT_NONE 	
RT_PK
RT_AFTER_MODIFYB�Protos�Protos\\Metadata'
        , true);

        static::$is_initialized = true;
    }
}

