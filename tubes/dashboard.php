<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require("view/partials/dashboard.php");
require("view/partials/overview.php");
require("view/partials/allproject.php");
require("view/partials/newproject.php");
require("view/partials/member.php");
require("view/partials/setting.php");
require("view/dashboard.view.php");

