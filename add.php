

<?php
require_once "pdo.php";
session_start();
if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql); // 使用 $conn 而不是 $pdo
    $stmt->execute(array(':name' => $_POST['name'],':email' => $_POST['email'],':password' => $_POST['password']));
    $_SESSION['success'] = 'Record Added';
    header( 'Location: index.php' ) ;
    return;
}
?>

<html><head>
</head><body >
<p style="text-align: center;">Add A New User</p>
<form method="post" style="display: block; margin: 0 auto; width: 300px;">
<p>Name:<input type="text" name="name" size="40"></p>
<p>Email:<input type="text" name="email"></p>
<p>Password:<input type="password" name="password"></p>
<p><input type="submit" value="Add New"/></p>
</form>
</body>

