<?php
namespace slowobject666;

class X {
  public $x = 1;
  }
class Y {
  public $x = array();
}
function test() {
  $x = (object)new Y;
  var_dump($x->x);
  $x = new X;
  var_dump($x->x);
}

<<__EntryPoint>>
function main_666() {
test();
}