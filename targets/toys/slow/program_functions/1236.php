<?php
namespace slowprogramfunctions1236;

function p($a) {
 print $a;
}

 <<__EntryPoint>>
function main_1236() {
register_shutdown_function('p', 'shutdown');
}
