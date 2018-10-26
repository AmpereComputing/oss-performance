<?php
namespace slowextmysqlmysqlgetprotoinfo;
require_once('connect.inc');

$conn = mysql_connect($host, $user, $passwd);
var_dump(mysql_get_proto_info());
