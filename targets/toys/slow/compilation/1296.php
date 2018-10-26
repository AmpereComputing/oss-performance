<?php
namespace slowcompilation1296;

function test($className) {
$x = new ReflectionClass($className);
return $x->newInstance()->loadAll();
 }
