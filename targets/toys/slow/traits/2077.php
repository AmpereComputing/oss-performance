<?php
namespace slowtraits2077;

trait baz  {
  public function bar() {
 yield 1;
 }
}
class foo {
  use baz;
  public function bar() {
}
}
