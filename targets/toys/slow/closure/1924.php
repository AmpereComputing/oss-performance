<?php
namespace slowclosure1924;

class Foo {
  function bar() {
    $abc = 123;
    $a = function ($abc) use ($abc) {
      var_dump($abc);
    }
;
    return $a;
  }
}

<<__EntryPoint>>
function main_1924() {
$a = Foo::bar();
$a(456);
}
