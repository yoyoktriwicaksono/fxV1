<?php
session_start();
unset($_SESSION['legal']);
session_destroy();
header("Location:../../");
?>