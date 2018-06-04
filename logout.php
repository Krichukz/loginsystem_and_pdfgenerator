<?php

session_start();
$_SESSION = array(); // noņemam sesijas mainīgos
session_destroy(); // izbeidzam sesiju
header("location: login.php"); // pāradresējam uz login lapu
exit;

?>
