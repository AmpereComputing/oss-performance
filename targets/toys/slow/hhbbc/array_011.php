<?php
namespace slowhhbbcarray011;

function bar(bool $k) {
  $x = null;
  for (;;) {
    $x = array('x' => $x);
    if ($k) return $x;
  }
}
