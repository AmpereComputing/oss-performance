<?php
namespace slowlatestaticbinding1888;

class Y {
  static function baz($a) {
 var_dump(get_called_class());
 }
}
class X {
  function foo() {
    Y::baz(static::bar());
  }
  static function bar() {
    var_dump(get_called_class());
  }
}

<<__EntryPoint>>
function main_1888() {
$x = new X;
$x->foo();
}