<?php
namespace slowgoto1910;

function foo() {
 goto a;
 echo 'Foo';
 a: echo 'Bar';
}

 <<__EntryPoint>>
function main_1910() {
foo();
}
