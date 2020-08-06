<?php

$dbhost = 'localhost'; // localhost
$dbuname = 'root';
$dbpass = 'root';
$dbname = 'NCAA';

$dbo = new PDO('mysql:host=' . $dbhost . ';port=8888;dbname=' . $dbname, $dbuname, $dbpass);
