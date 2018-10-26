<?hh
namespace quickhopttypemutate3;

function run() {
  $a = 5;
  $b =& $a;

  $a = 1;
  $a = true;
  $b = 3;

  return $a;
}

var_dump(run());
