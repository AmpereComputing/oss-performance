<?hh
namespace slowcollectionclassespairclone;

function main($n) {
  $p = Pair{array($n), "foobar"};
  while (--$n > 0) $p2 = clone $p;
}


<<__EntryPoint>>
function main_pair_clone() {
ini_set('memory_limit', '17M');
main(100000);
echo "pass\n";
}