<?php
$servername = "rvis.ddns.net:13306";
$username = "nvaria";
$password = "Belmont47";
$dbname = "coa123wdb";
$conn = new mysqli($servername, $username, $password, $dbname);

echo get_include_path();
var_dump(stream_resolve_include_path("db.php"));
