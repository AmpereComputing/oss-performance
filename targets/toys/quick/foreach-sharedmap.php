<?php
namespace quickforeachsharedmap;

$arr = array(1,2,3);
var_dump(apc_store('bluh', $arr));

$bla = apc_fetch('bluh');
foreach ($bla as $idx => $num) {
  $bla[$idx]++;
}
var_dump($bla);
var_dump($arr);