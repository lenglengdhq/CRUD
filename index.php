<?php
require_once "pdo.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #e9e9e9;
        }
        a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo '<p style="color:green">' . $_SESSION['success'] . "</p>\n";
    unset($_SESSION['success']);
}
?>
<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $conn->query("SELECT name, email, password, user_id FROM users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo htmlentities($row['name']);
            echo "</td><td>";
            echo htmlentities($row['email']);
            echo "</td><td>";
            echo htmlentities($row['password']);
            echo "</td><td>";
            echo '<a href="edit.php?user_id=' . $row['user_id'] . '">Edit</a> / ';
            echo '<a href="delete.php?user_id=' . $row['user_id'] . '">Delete</a>';
            echo "</td></tr>\n";
        }
        ?>
    </tbody>
</table>
<a href="add.php">Add New</a>
</body>
</html>
