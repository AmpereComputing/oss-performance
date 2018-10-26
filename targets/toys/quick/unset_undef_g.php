<?hh
namespace quickunsetundefg;
function test($t) {
  unset($GLOBALS['foo']['bar']);
}
test(null);
