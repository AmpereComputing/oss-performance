<?php
namespace slowdynamicmethods1210;

class z {
  function __construct() {
 echo 'construct';
 }
  function z() {
 echo 'method';
 }
}

<<__EntryPoint>>
function main_1210() {
$z = new z;
$z->z();
}
