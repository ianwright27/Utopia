<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Check if user is trying to access restricted pages
$allowed_pages = array(
    'index.html',
    'forgot/'
);

$current_page = basename($_SERVER['PHP_SELF']);

// Check if user is trying to access admin dashboard
if ($_SESSION['username'] === '4dm1n' && $current_page !== 'index.html') {
    // Admin user, allow access to admin dashboard
    // You can add more conditions for admin-only pages here
    // For example, if ($current_page !== 'index.html' && $current_page !== 'forgot/') { ... }
} elseif ($_SESSION['username'] !== '4dm1n' && $current_page === '4dm1n') {
    // Regular user trying to access admin dashboard, redirect to homepage
    header("Location: index.html");
    exit();
}

// Check if user is trying to access home/dashboard
if ($_SESSION['username'] !== '4dm1n' && $current_page === 'home/') {
    // Regular user, allow access to dashboard
    // You can add more conditions for user-only pages here
    // For example, if ($current_page !== 'home/' && $current_page !== 'forgot/') { ... }
} elseif ($_SESSION['username'] === '4dm1n' && $current_page !== 'home/') {
    // Admin user trying to access regular user dashboard, redirect to admin dashboard
    header("Location: 4dm1n");
    exit();
}
