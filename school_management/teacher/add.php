<?php include '../includes/header.php'; ?>
<h1>Add Teacher</h1>
<form action="add.php" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone"><br>
    <label for="hire_date">Hire Date:</label>
    <input type="date" id="hire_date" name="hire_date"><br>
    <button type="submit">Add Teacher</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config/database.php';
    $stmt = $pdo->prepare('INSERT INTO teachers (first_name, last_name, email, phone, hire_date) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['hire_date']]);
    header('Location: list.php');
}
?>
<?php include '../includes/footer.php'; ?>
