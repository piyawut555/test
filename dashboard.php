<?php
session_start();
include('db.php');

if(!isset($_SESSION['admin_login'])){
    header("location: signin.php");
    exit();
}

if(isset($_SESSION['admin_login'])){
    $admin_id = $_SESSION['admin_login'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $admin_id");
    $row = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h3>
    <?php 
        if (isset($row)) {
            echo ($row['firstname']) . " " . htmlspecialchars($row['lastname']);
        } else {
            echo "No user found";
        }
    ?>
    </h3>
</body>
</html>
