<?php
namespace slowcompilation1308;

function foo() {
  define('AAA', 1);
  if (false) {
    define('BBB', 'bbb');
  }
}
