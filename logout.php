<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// If you want to destroy the session cookie, you can do so
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();

// Redirect to span.php page
header("Location: http://localhost/Book-My-Bus/login.php");
exit;
?>