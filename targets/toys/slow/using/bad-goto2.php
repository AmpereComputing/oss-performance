<?php
namespace slowusingbadgoto2;

function main() {
  goto foo;
  using ($x);
  foo:
}
