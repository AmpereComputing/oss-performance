<?php
namespace slowarrayfunctions527;


// disable array -> "Array" conversion notice
<<__EntryPoint>>
function main_527() {
error_reporting(error_reporting() & ~E_NOTICE);

var_dump(array_unique(array(array(1,2), array(1,2), array(3,4),)));
}
