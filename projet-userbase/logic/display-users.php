<?php

require './models/User.php';
require './models/UserManager.php'; 


$userManager = new UserManager();

$usersTable = $userManager->loadUsers();


?>

