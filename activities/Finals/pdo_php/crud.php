<?php
    include 'connection.php';

    echo "<pre>\n";
    $stmt = $pdo->query("SELECT * FROM users");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows);
    echo "</pre>\n";

    // Insert new user
    if (isset($_POST['action']) && $_POST['action'] == 'insert') {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':name' => $_POST['name'],
                ':email' => $_POST['email'],
                ':password' => $_POST['password']
            ));
        }
    }

    // Delete user
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        if (isset($_POST['user_id'])) {
            $sql = "DELETE FROM users WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':user_id' => $_POST['user_id']));
        }
    }

    // Update user
    if (isset($_POST['action']) && $_POST['action'] == 'update') {
        if (isset($_POST['user_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':name' => $_POST['name'],
                ':email' => $_POST['email'],
                ':password' => $_POST['password'],
                ':user_id' => $_POST['user_id']
            ));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
</head>
<body>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    <td>
                        <button onclick="editUser('<?php echo $row['user_id']; ?>', '<?php echo $row['name']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['password']; ?>')">Edit</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<br>
    <div class="addusers">
        <form action="" method="post">
            <input type="hidden" name="action" value="insert">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" required>
            </div>
            <input type="submit" value="Add User">
        </form>
    </div>

    <!-- Edit User Modal -->
    <div id="editModal" style="display:none;">
        <form action="" method="post">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="user_id" id="edit_user_id">
            <div>
                <label for="edit_name">Name:</label>
                <input type="text" name="name" id="edit_name" required>
            </div>
            <div>
                <label for="edit_email">Email:</label>
                <input type="text" name="email" id="edit_email" required>
            </div>
            <div>
                <label for="edit_password">Password:</label>
                <input type="text" name="password" id="edit_password" required>
            </div>
            <button type="submit">Save Changes</button>
            <button type="button" onclick="closeEditModal()">Cancel</button>
        </form>
    </div>

    <script>
        function editUser(userId, name, email, password) {
            document.getElementById('edit_user_id').value = userId;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_password').value = password;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
