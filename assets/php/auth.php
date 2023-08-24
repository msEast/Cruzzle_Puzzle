<?php
session_start();

$usersFile = 'users.json'; // JSON file to store user credentials

function loadUsers() {
    global $usersFile;
    if (file_exists($usersFile)) {
        $data = file_get_contents($usersFile);
        return json_decode($data, true);
    }
    return [];
}

function saveUsers($users) {
    global $usersFile;
    $data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents($usersFile, $data);
}

function signup($username, $password) {
    $users = loadUsers();
    if (!isset($users[$username])) {
        $users[$username] = password_hash($password, PASSWORD_DEFAULT);
        saveUsers($users);
        return true;
    }
    return false;
}

function login($username, $password) {
    $users = loadUsers();
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;
        return true;
    }
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['username']);
}

function logout() {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
