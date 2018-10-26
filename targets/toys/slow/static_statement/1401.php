<?php
namespace slowstaticstatement1401;


<<__EntryPoint>>
function main_1401() {
static $static_var;
echo $static_var . "\n";
$static_var = 1;
echo $static_var . "\n";
}
