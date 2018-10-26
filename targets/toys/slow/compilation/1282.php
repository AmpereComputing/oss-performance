<?php
namespace slowcompilation1282;

class A {
 function test(A $a) {
 $a->foo();
}
 function foo() {
 print 'foo';
}
}
