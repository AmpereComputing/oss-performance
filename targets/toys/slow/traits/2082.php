<?php
namespace slowtraits2082;

trait Too {
  function bar() {
    $abc = 123;
    $a = function ($abc) use ($abc) {
      var_dump($abc);
    }
;
    return $a;
  }
}
class Foo {
 use Too;
 }

<<__EntryPoint>>
function main_2082() {
$a = Foo::bar();
$a(456);
}