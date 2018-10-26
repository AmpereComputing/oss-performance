<?hh
namespace quickhoptadd1;

function foo() {
  $x = 3;
  if (2 + $x) { return $x; }
  else { return 2; }
}

echo "foo(): " . foo() . "\n";
