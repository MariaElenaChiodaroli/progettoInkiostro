<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'mcm2'); //host, username, password, nome del db

if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
