<?php
namespace slowredeclaredfunctions1459;


<<__EntryPoint>>
function main_1459() {
if (true) {
  function test() {
    echo('a');
  }
}
 else {
  function test() {
    echo('b');
  }
}
test();
}
