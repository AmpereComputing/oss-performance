<?hh
namespace quickundefinedbases;


function id($x) { return $x; }

class c {}

function main() {
  $name = 'varname';

  $x = $undef['foo'];

  $x = $GLOBALS[$name]['foo'];
  $x = $GLOBALS[id($name)]['foo'];
}
main();
