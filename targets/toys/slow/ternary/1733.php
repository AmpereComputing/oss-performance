<?php
namespace slowternary1733;

function add_cssclass($add, $class) {
  $class = empty($class) ? $add : $class .= ' ' . $add;
  return $class;
}
add_cssclass('test', $a);
