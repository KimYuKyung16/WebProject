<?php
session_start();
if(!isset($_SESSION['id'])) {
    echo "<script>location.replace('login.php');</script>";            
}

else {
    $username = $_SESSION['id'];
    $name = $_SESSION['pw'];
} 
?>

<body>
    <div class="base">
        <h2><?php echo "Hi, $username($name)";?></h2>
        <button type="button" class="btn" onclick="location.href='logout.php'">
            LOGOUT
        </button>
    </div>
</body>