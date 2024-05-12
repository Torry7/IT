<?php

$conn = mysqli_connect("localhost", "root", "", "login1");

if (!$conn) {
    echo "Connection Failed";
}