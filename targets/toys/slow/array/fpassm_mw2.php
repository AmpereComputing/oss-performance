<?php
namespace slowarrayfpassmmw2;
// Copyright 2004-present Facebook. All Rights Reserved.

function byref(&$a) {}

<<__EntryPoint>>
function main() {
  $a = array();
  byref(&$a[][0]);
  var_dump($a);
}
