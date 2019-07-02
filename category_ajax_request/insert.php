<?php
include '../classes/Sync_from_Desktop.php';
$s = new Sync_from_Desktop();

$s->Insert("CATEGORY", $s->get_table_columns("CATEGORY"), $column_values, $query_placeholder);