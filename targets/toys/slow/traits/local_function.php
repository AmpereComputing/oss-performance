<?php
namespace slowtraitslocalfunction;

require_once("local_function.inc");

class C { use T; }

C::foo();
bar();
