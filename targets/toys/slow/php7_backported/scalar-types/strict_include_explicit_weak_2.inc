<?php
namespace slowphp7backportedscalartypesstrictincludeexplicitweak2;

declare(strict_types=0);

function takes_int(int $x) {
    echo "Success!";
}

takes_int(1.0); // succeeds in weak mode
