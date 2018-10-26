<?php
namespace slowcompilation1288;

function bug1($a, $b) {
foreach ($b[$a++ + $a++] as $x) {
 echo $x;
 }
}
