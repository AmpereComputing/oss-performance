<?php
namespace slowrenamefunction1194;

function err($code,$msg) {
 var_dump($code,$msg);
 }
function test1() {
}
function test2() {
}

<<__EntryPoint>>
function main_1194() {
set_error_handler('err');
fb_rename_function('test1', 'test3');
fb_rename_function('test2', 'test1');
fb_rename_function('test1', 'test2');
fb_rename_function('test3', 'test1');
}
