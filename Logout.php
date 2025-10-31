<?php

session_start();

session_unset();
session_destroy();

// Prevent caching again
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

header("location:Login_Form.php");
exit;
