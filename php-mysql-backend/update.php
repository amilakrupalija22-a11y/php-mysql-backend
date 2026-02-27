<?php
include "config.php";

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];

    $stmt = $conn->prepare(
        "UPDATE users SET ime=?, prezime=?, email=? WHERE id=?"
    );
    $stmt->bind_param("sssi", $ime, $prezime, $email, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit User</h5>
        </div>
        <div class="card-body">
            <form method="POST" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="ime" class="form-control" value="<?= $user['ime'] ?>" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="prezime" class="form-control" value="<?= $user['prezime'] ?>" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
                </div>

                <div class="col-12">
                    <button type="submit" name="update" class="btn btn-warning">
                        Save Changes
                    </button>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
