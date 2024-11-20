<?php

session_start();

unset($_SESSION['ClienteID']);

header("Location: index.php");
?>