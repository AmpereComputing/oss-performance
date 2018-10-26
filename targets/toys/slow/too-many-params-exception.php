<?hh // strict
namespace slowtoomanyparamsexception;

function f(mixed $x) {
  echo "done\n";
}

f(1,2);
