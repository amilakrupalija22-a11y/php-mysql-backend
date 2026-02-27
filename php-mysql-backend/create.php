<?php
include "config.php";

if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];

    if (!empty($ime) && !empty($prezime) && !empty($email)) {
        $stmt = $conn->prepare(
            "INSERT INTO users (ime, prezime, email) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $ime, $prezime, $email);
        $stmt->execute();
    }

    header("Location: index.php");
}
?>
