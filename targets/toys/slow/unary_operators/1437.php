<?php
namespace slowunaryoperators1437;


// disable array -> "Array" conversion notice
<<__EntryPoint>>
function main_1437() {
error_reporting(error_reporting() & ~E_NOTICE);

var_dump(array("\0" => 1));
var_dump(array("\0" => "\0"));
var_dump(array("\0" => "\\"));
var_dump(array("\0" => "\'"));
var_dump(array("\\" => 1));
var_dump(array("\\" => "\0"));
var_dump(array("\\" => "\\"));
var_dump(array("\\" => "\'"));
var_dump(array("\'" => 1));
var_dump(array("\'" => "\0"));
var_dump(array("\'" => "\\"));
var_dump(array("\'" => "\'"));
var_dump(array("\a" => "\a"));
var_dump(!array("\0" => "\0"));
var_dump((array("\0" => "\0")));
var_dump((int)array("\0" => "\0"));
var_dump((integer)array("\0" => "\0"));
var_dump((bool)array("\0" => "\0"));
var_dump((boolean)array("\0" => "\0"));
var_dump((float)array("\0" => "\0"));
var_dump((double)array("\0" => "\0"));
var_dump((real)array("\0" => "\0"));
var_dump((string)array("\0" => "\0"));
$a = "0x10";
var_dump($a);
var_dump("\0");
$a = array("\0" => 1);
var_dump($a);
$a = array("\0" => "\0");
var_dump($a);
$a = array("\0" => "\\");
var_dump($a);
$a = array("\0" => "\'");
var_dump($a);
$a = array("\\" => 1);
var_dump($a);
$a = array("\\" => "\0");
var_dump($a);
$a = array("\\" => "\\");
var_dump($a);
$a = array("\\" => "\'");
var_dump($a);
$a = array("\'" => 1);
var_dump($a);
$a = array("\'" => "\0");
var_dump($a);
$a = array("\'" => "\\");
var_dump($a);
$a = array("\'" => "\'");
var_dump($a);
$a = array("\a" => "\a");
var_dump($a);
}
