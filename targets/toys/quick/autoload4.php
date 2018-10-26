<?hh
namespace quickautoload4;

print "Test begin\n";

function __autoload($cls) {
  echo "__autoload $cls\n";
}

require "autoload4.inc";

print "Test end\n";
