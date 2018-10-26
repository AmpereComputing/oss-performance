<?hh
namespace slowhhbbcbuiltin003;

function y() { return null; }
function x() { return array_values(y()); }

<<__EntryPoint>>
function main_builtin_003() {
x();
}
