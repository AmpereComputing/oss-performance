<?php
namespace slowstringmodifycharnul;

$s="abc";
var_dump($s[1] = "\0");
var_dump($s[2] = "");
