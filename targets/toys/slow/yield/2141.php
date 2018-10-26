<?php
namespace slowyield2141;

function fruit() {
 yield 'apple';
 yield 'banana';
}


 <<__EntryPoint>>
function main_2141() {
foreach (fruit() as $fruit) {
 var_dump($fruit);
}
}
