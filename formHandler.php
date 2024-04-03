<?php
// formHandler.php

// Process form data
$service = $_GET['services'];
$location = $_GET['locations'];

// Redirect user to info.php with parameters
header("Location: info.php?service=$service&location=$location");
exit;
?>
