<?php
namespace slowhhbbcarray012;

// Potentially an infinitely-growing map type.
function foo($x) { return $x ? array('x' => foo()) : array('y' => foo()); }
