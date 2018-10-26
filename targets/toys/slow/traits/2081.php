<?php
namespace slowtraits2081;

trait T1 {
 function foo() {
 yield 1;
 }
 }
trait T2 {
  use T1 {
    foo as bar;
  }
  function foo() {
 return bar();
 }
}
class C {
 use T2;
 }

<<__EntryPoint>>
function main_2081() {
foreach (C::bar() as $x) var_dump($x);
}
