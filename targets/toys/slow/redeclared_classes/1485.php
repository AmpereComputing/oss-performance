<?php
namespace slowredeclaredclasses1485;


<<__EntryPoint>>
function main_1485() {
if (true) {
  class A {
    private $a = 1;
  }
  class B extends A {
    public $a;
    function f() {
 $this->a = 2;
 }
  }
}
 else {
  class A {
    protected $a = 1;
  }
  class B extends A {
    public $a;
    function f() {
 $this->a = 2;
 }
  }
}
$obj = new B;
$obj->f();
var_dump($obj);
}
