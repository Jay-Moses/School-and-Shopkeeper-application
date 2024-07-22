<?php include '../includes/header.php'; ?>
<h1>Teachers</h1>
<a href="add.php">Add Teacher</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../config/database.php';
        $stmt = $pdo->query('SELECT * FROM teachers');
        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> |
                        <a href='delete.php?id={$row['id']}'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>
