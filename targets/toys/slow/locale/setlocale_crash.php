<?php
namespace slowlocalesetlocalecrash;

<<__EntryPoint>>
function main_setlocale_crash() {
setlocale(LC_ALL, 'LC_CTYPE=;LC_NUMERIC=C;LC_TIME=;LC_COLLATE=;LC_MONETARY=;LC_MESSAGES=;LC_PAPER=;LC_NAME=;LC_ADDRESS=;LC_TELEPHONE=;LC_MEASUREMENT=;LC_IDENTIFICATION=');
}
