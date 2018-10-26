<?php
namespace slowtypes1747;

function p(array $i = null) {
  var_dump($i);
  $i = array();
}
function q() {
  p(null);
}

<<__EntryPoint>>
function main_1747() {
p();
}
