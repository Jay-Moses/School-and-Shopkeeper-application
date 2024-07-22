<?php
include '../includes/header.php';
include '../config/database.php';

if (!isset($_GET['id'])) {
    header('Location: list.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE students SET first_name = ?, last_name = ?, email = ?, phone = ?, date_of_birth = ? WHERE id = ?');
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['date_of_birth'], $id]);
    header('Location: list.php');
}

$stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
$stmt->execute([$id]);
$student = $stmt->fetch();

if (!$student) {
    header('Location: list.php');
    exit;
}
?>

<h1>Edit Student</h1>
<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo $student['first_name']; ?>" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo $student['last_name']; ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $student['phone']; ?>"><br>
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>"><br>
    <button type="submit">Update Student</button>
</form>
<?php include '../includes/footer.php'; ?>
