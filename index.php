<?php

require 'vendor/autoload.php';

$api = new PHP_CRUD_API([
    'dbengine' => 'MySQL',
    'username' => 'root',
    'password' => null,
    'database' => 'world',
    'hostname' => 'pca-db',
    'port' => '3306',
    'socket' => null,
    'charset' => 'utf8',
    // callbacks with their default behavior
    'table_authorizer' => function ($cmd, $db, $tab) {
        return true;
    },
    'record_filter' => function ($cmd, $db, $tab) {
        return false;
    },
    'column_authorizer' => function ($cmd, $db, $tab, $col) {
        return true;
    },
    'tenancy_function' => function ($cmd, $db, $tab, $col) {
        return null;
    },
    'input_sanitizer' => function ($cmd, $db, $tab, $col, $typ, $val) {
        return $val;
    },
    'input_validator' => function ($cmd, $db, $tab, $col, $typ, $val, $ctx) {
        return true;
    },
    'before' => function (&$cmd, &$db, &$tab, &$id, &$in) {
        // print_r([$cmd, $db, $tab, $id, $in, $_GET]); exit;
    },
    'after' => function ($cmd, $db, $tab, $id, $in, $out) {
        // print_r([$cmd, $db, $tab, $id, $in, $out]); exit;
    },
]);

$api->executeCommand();
