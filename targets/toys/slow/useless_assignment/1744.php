<?php
namespace slowuselessassignment1744;

function bar() {
}
function foo() {
  $foo = bar();
  unset($foo);
}

<<__EntryPoint>>
function main_1744() {
foo();
}