<?hh
namespace slowarithmeticselectintdbl;
// Copyright 2004-present Facebook. All Rights Reserved.

function main($a, $b) {
  var_dump(max($a - $b, 0), min($a - $b, 0));
}

<<__EntryPoint>>
function main_select_int_dbl() {
main(1.5, 0.75);
main(0.75, 1.5);
}
