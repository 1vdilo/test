<?php
session_start();
print_r($_SESSION);


require './src/servises/connect.php';
require './src/utils/Router.php';
require './src/controller/Adm.php';
require './src/router/route.php';






