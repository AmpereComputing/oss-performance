<?php
namespace slowarrayescalation409;


<<__EntryPoint>>
function main_409() {
$a = array('a' => 'va');
 $a += array('c' => array(3));
 var_dump($a);
}
