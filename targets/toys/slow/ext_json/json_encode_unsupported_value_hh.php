<?hh
namespace slowextjsonjsonencodeunsupportedvaluehh;


// This file is ran with -vEval.EnableHipHopSyntax=1

// -----------------------------------------
// Closures
// -----------------------------------------

<<__EntryPoint>>
function main_json_encode_unsupported_value_hh() {
var_dump(json_encode(function() {}));
var_dump(json_encode(() ==> {}));
var_dump(json_encode([1, 2, () ==> {}]));

// With partial output on errors.
var_dump(json_encode(function() {}, JSON_PARTIAL_OUTPUT_ON_ERROR));
var_dump(json_encode(() ==> {}, JSON_PARTIAL_OUTPUT_ON_ERROR));
var_dump(json_encode([1, 2, () ==> {}], JSON_PARTIAL_OUTPUT_ON_ERROR));
}
