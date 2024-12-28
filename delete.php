<?php
require_once "pdo.php";
session_start();
if ( isset($_POST['delete']) && isset($_POST['user_id']) ) {
    $sql = "DELETE FROM users WHERE user_id = :zip";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['user_id']));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}
$stmt = $conn->prepare("SELECT name, user_id FROM users where user_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for user_id';
    header( 'Location: index.php' ) ;
    return;
}
?>

<html>
<head>
</head>
<body>

<p style="text-align: center;font-size: 30px;">Confirm: Deleting <?= htmlentities($row['name']) ?></p>

<form method="post" style="text-align: center;">
    <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
    <input type="submit" value="Delete" name="delete">
    <a href="index.php">Cancel</a>
</form>
</body>
</html>