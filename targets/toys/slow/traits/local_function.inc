<?php
namespace slowtraitslocalfunction;

trait T {
  static function foo() {
    function bar() {
      var_dump(__METHOD__);
    }
  }
}
