<?php
namespace slowsuperglobals1385;

function test() {
  $_POST = array('HELLO' => 1);
}

<<__EntryPoint>>
function main_1385() {
test();
var_dump($_POST);
}
