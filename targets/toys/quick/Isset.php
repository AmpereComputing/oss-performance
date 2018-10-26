<?hh
namespace quickIsset;

function f() {
  global $y;

  print ":".isset($x).":\n";
  print ":".isset($y).":\n";

  $x = 0;
  $y = 0;
  print ":".isset($x).":\n";
  print ":".isset($y).":\n";

  unset($x);
  unset($y);
  print ":".isset($x).":\n";
  print ":".isset($y).":\n";

  $a = array();
  $a["foo"] = null;
  var_dump(isset($a["foo"]));
  $q =& $a["foo"];
  var_dump(isset($a["foo"]));
  unset($q);
  var_dump(isset($a["foo"]));
}

f();

/*********/

function get_index() {
  echo "I've made a huge mistake\n";
  return 0;
}

$a = 4;
$arr = array("get_index should not be called");
var_dump(isset($a, $b, $arr[get_index()]));

/**
 * Check for a peculiar translator interaction with IssetM, where
 * a dirty, variant local in the same BB as IssetM could cause the
 * local to morph into a cell.
 */

function g($dontTake, &$toFillIn, $id, $key, $value) {
  $toFillIn = array();
  if (isset($toFillIn[$id])) {
    $cur = $toFillIn[$id];
  }
  $toFillIn[$id] = $value;
}

$a = null;
g(null, &$a, "127.0.0.1", null, null );
var_dump($a);

