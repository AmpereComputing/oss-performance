<?hh
namespace slowtoomanyparams3;

function f($x, $y = 1){
  echo "done\n";
}

f(1,2,3);
