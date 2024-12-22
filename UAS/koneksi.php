<?php

$conn = mysqli_connect("localhost","root","", "db_smpkartini");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}