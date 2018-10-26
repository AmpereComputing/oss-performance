<?hh
namespace slowreifiedgenericscalluserfunc2;

function f<reify T>() { echo "done\n"; }

call_user_func("f");
