<?php
include '../includes/header.php';
include '../config/database.php';

if (!isset($_GET['id'])) {
    header('Location: list.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('UPDATE teachers SET first_name = ?, last_name = ?, email = ?, phone = ?, hire_date = ? WHERE id = ?');
    $stmt->execute([$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['hire_date'], $id]);
    header('Location: list.php');
}

$stmt = $pdo->prepare('SELECT * FROM teachers WHERE id = ?');
$stmt->execute([$id]);
$teacher = $stmt->fetch();

if (!$teacher) {
    header('Location: list.php');
    exit;
}
?>

<h1>Edit Teacher</h1>
<form action="edit.php?id=<?php echo $id; ?>" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo $teacher['first_name']; ?>" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo $teacher['last_name']; ?>" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $teacher['email']; ?>" required><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $teacher['phone']; ?>"><br>
    <label for="hire_date">Hire Date:</label>
    <input type="date" id="hire_date" name="hire_date" value="<?php echo $teacher['hire_date']; ?>"><br>
    <button type="submit">Update Teacher</button>
</form>
<?php include '../includes/footer.php'; ?>
