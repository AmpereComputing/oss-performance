<?php
namespace slowscalararray546;

function test1() {
 $a = array(__FUNCTION__, __LINE__);
 return $a;
 }
function test2() {
 $a = array(__FUNCTION__, __LINE__);
 return $a;
 }

<<__EntryPoint>>
function main_546() {
var_dump(test1());
 var_dump(test2());
}