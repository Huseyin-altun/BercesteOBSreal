<?php 
ob_start();
session_start();
session_destroy();
header("Location: http://localhost/ProjectObs/index.php");
?>