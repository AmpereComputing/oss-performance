<?hh
namespace slowdvarrayhackarrgiant;
// Copyright 2004-present Facebook. All Rights Reserved.

function f() {
  static $x = 0;
  return $x++;
}

function test() {
  $x1 = varray[
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
    f(), f(), f(), f(), f(), f(), f(), f(), f(), f(),
  ];
  var_dump(is_array($x1));
  var_dump(is_vec($x1));
  var_dump(is_dict($x1));
  var_dump(is_varray($x1));
  var_dump(is_darray($x1));

  $x2 = darray[
    0 => f(), 1 => f(), 2 => f(), 3 => f(), 4 => f(),
    5 => f(), 6 => f(), 7 => f(), 8 => f(), 9 => f(),
    10 => f(), 11 => f(), 12 => f(), 13 => f(), 14 => f(),
    15 => f(), 16 => f(), 17 => f(), 18 => f(), 19 => f(),
    20 => f(), 21 => f(), 22 => f(), 23 => f(), 24 => f(),
    25 => f(), 26 => f(), 27 => f(), 28 => f(), 29 => f(),
    30 => f(), 31 => f(), 32 => f(), 33 => f(), 34 => f(),
    35 => f(), 36 => f(), 37 => f(), 38 => f(), 39 => f(),
    40 => f(), 41 => f(), 42 => f(), 43 => f(), 44 => f(),
    45 => f(), 46 => f(), 47 => f(), 48 => f(), 49 => f(),
    50 => f(), 51 => f(), 52 => f(), 53 => f(), 54 => f(),
    55 => f(), 56 => f(), 57 => f(), 58 => f(), 59 => f(),
    60 => f(), 61 => f(), 62 => f(), 63 => f(), 64 => f(),
    65 => f(), 66 => f(), 67 => f(), 68 => f(), 69 => f(),
    70 => f(), 71 => f(), 72 => f(), 73 => f(), 74 => f(),
    75 => f(), 76 => f(), 77 => f(), 78 => f(), 79 => f(),
    80 => f(), 81 => f(), 82 => f(), 83 => f(), 84 => f(),
    85 => f(), 86 => f(), 87 => f(), 88 => f(), 89 => f(),
    90 => f(), 91 => f(), 92 => f(), 93 => f(), 94 => f(),
    95 => f(), 96 => f(), 97 => f(), 98 => f(), 99 => f()
  ];
  var_dump(is_array($x2));
  var_dump(is_vec($x2));
  var_dump(is_dict($x2));
  var_dump(is_varray($x2));
  var_dump(is_darray($x2));

  $x3 = darray[
    'k0' => f(), 'k1' => f(), 'k2' => f(), 'k3' => f(), 'k4' => f(),
    'k5' => f(), 'k6' => f(), 'k7' => f(), 'k8' => f(), 'k9' => f(),
    'k10' => f(), 'k11' => f(), 'k12' => f(), 'k13' => f(), 'k14' => f(),
    'k15' => f(), 'k16' => f(), 'k17' => f(), 'k18' => f(), 'k19' => f(),
    'k20' => f(), 'k21' => f(), 'k22' => f(), 'k23' => f(), 'k24' => f(),
    'k25' => f(), 'k26' => f(), 'k27' => f(), 'k28' => f(), 'k29' => f(),
    'k30' => f(), 'k31' => f(), 'k32' => f(), 'k33' => f(), 'k34' => f(),
    'k35' => f(), 'k36' => f(), 'k37' => f(), 'k38' => f(), 'k39' => f(),
    'k40' => f(), 'k41' => f(), 'k42' => f(), 'k43' => f(), 'k44' => f(),
    'k45' => f(), 'k46' => f(), 'k47' => f(), 'k48' => f(), 'k49' => f(),
    'k50' => f(), 'k51' => f(), 'k52' => f(), 'k53' => f(), 'k54' => f(),
    'k55' => f(), 'k56' => f(), 'k57' => f(), 'k58' => f(), 'k59' => f(),
    'k60' => f(), 'k61' => f(), 'k62' => f(), 'k63' => f(), 'k64' => f(),
    'k65' => f(), 'k66' => f(), 'k67' => f(), 'k68' => f(), 'k69' => f(),
    'k70' => f(), 'k71' => f(), 'k72' => f(), 'k73' => f(), 'k74' => f(),
    'k75' => f(), 'k76' => f(), 'k77' => f(), 'k78' => f(), 'k79' => f(),
    'k80' => f(), 'k81' => f(), 'k82' => f(), 'k83' => f(), 'k84' => f(),
    'k85' => f(), 'k86' => f(), 'k87' => f(), 'k88' => f(), 'k89' => f(),
    'k90' => f(), 'k91' => f(), 'k92' => f(), 'k93' => f(), 'k94' => f(),
    'k95' => f(), 'k96' => f(), 'k97' => f(), 'k98' => f(), 'k99' => f()
  ];
  var_dump(is_array($x3));
  var_dump(is_vec($x3));
  var_dump(is_dict($x3));
  var_dump(is_varray($x3));
  var_dump(is_darray($x3));
}


<<__EntryPoint>>
function main_giant() {
test();
}
