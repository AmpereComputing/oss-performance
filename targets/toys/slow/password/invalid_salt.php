<?php
namespace slowpasswordinvalidsalt;
password_hash('foo', PASSWORD_BCRYPT, array('salt' => array()));
