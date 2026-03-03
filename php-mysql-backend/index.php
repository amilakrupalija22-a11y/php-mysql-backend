<?php include "read.php"; ?>

<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">


    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">User Management</h5>
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-body">
            <h6 class="mb-3">Add New User</h6>

            <form method="POST" action="create.php" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="ime" class="form-control" placeholder="Ime" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="prezime" class="form-control" placeholder="Prezime" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add User
                    </button>
                </div>
            </form>
        </div>
    </div>

 
    <div class="card">
        <div class="card-body">
            <h6 class="mb-3">Users List</h6>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['ime'] ?></td>
                            <td><?= $row['prezime'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= date("d.m.Y", strtotime($row['created_at'])) ?></td>
                            <td>
                                <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-gear"></i>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Da li ste sigurni?')">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="assets/script.js"></script>
</body>
</html>
