<?php
namespace slowapc1817;

class a {
  protected $foo = 10;
}

<<__EntryPoint>>
function main_1817() {
$x = new a;
apc_store('x', array($x));
$x = apc_fetch('x');
var_dump($x[0]);
}