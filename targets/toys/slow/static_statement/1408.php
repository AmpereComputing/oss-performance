<?php
namespace slowstaticstatement1408;
class a {
  static $b = FOO;
}
function foo() {
  static $a;
  static $a = FOO;
  echo $a;
}


<<__EntryPoint>>
function main_1408() {
define('FOO', 1);
foo();
echo a::$b;
}
