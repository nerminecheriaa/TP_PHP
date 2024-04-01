<?php

session_start();
include "classes/Util.php";
session_unset();
session_destroy();

$em="Logged out!";
Util::redirect("login.php", "error", $em);