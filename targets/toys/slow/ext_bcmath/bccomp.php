<?php
namespace slowextbcmathbccomp;

<<__EntryPoint>>
function main_bccomp() {
var_dump(bccomp("1", "2"));
var_dump(bccomp("1.00001", "1", 3));
var_dump(bccomp("1.00001", "1", 5));
}