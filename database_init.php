<?php
    header("Access-Control_Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-Width");
    header("Access-Control-Allow-Origin: http://localhost:3000");

    include("connection.php");
?>