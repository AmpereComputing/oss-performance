<?php
namespace slowclassconstant1610;

class Dummy {
}
class foo {
  public static $v = array(Dummy::c => 'foo');
}
interface A {
  const CONSTANT = 'CONSTANT';
}
class B implements A {
 }
class C {
  static $A_CONSTANT = A::CONSTANT;
  static $B_CONSTANT = B::CONSTANT;
}

<<__EntryPoint>>
function main_1610() {
var_dump(A::CONSTANT);
var_dump(B::CONSTANT);
var_dump(C::$A_CONSTANT);
var_dump(C::$B_CONSTANT);
}
