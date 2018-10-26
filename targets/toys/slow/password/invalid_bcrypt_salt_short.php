<?php
namespace slowpasswordinvalidbcryptsaltshort;
password_hash('foo', PASSWORD_BCRYPT, ["salt" => 'abc']);
