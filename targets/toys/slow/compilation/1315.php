<?php
namespace slowcompilation1315;

class X {
  function foo() {
    return function() {
      return $this->bar();
    }
;
  }
  function bar() {
}
}
