<?php
require 'utils.php';
session_start();

deleteUser($_SESSION['user']);
session_destroy();
header('location:index.php');
