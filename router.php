<?php
// Function to sanitize user input (prevent directory traversal)

function sanitizePageParameter($page) {
    return preg_replace('/[^a-zA-Z0-9\-_]/', '', $page); // Remove any characters except letters, numbers, hyphens, and underscores
}
// Check if the 'page' parameter is set in the URL
if(isset($_GET['page'])) {
    $page = sanitizePageParameter($_GET['page']);
    // Include the corresponding PHP file based on the 'page' parameter
    $filename = $page . '.php';
    if(file_exists($filename)) {
        include($filename);
    } else {
        // Handle page not found gracefully (redirect or display error message)
        // Example: header('Location: error.php');
        echo 'Page not found.';
        exit; // Terminate script execution after displaying the error message
    }
}

