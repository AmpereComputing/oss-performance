<?hh
namespace slowobjectinvokemethod765;

// taking references
class C2 {
  public function __invoke(&$a0) {
    var_dump($a0);
    return $a0++;
  }
}
$x = 0;
$c = new C2;
$c(&$x);
var_dump($x);
 // $x = 1