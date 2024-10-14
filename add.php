<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Pelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Mata Pelajaran</h1>

    <form action="add.php" method="POST">
        <label for="subject_name">Nama Mata Pelajaran:</label><br>
        <input type="text" name="subject_name" required><br><br>

        <label for="description">Deskripsi:</label> <br>
        <textarea name="description" required></textarea><br><br>

        <label for="hours">Jam Pelajaran:</label><br>
        <input type="number" name="hours" required><br><br>

        <button type="submit" name="submit">Tambah</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $subject_name = $_POST['subject_name'];
        $description = $_POST['description'];
        $hours = $_POST['hours'];

        // Menambahkan mata pelajaran baru ke database
        $stmt = $db->prepare("INSERT INTO subjects (subject_name, description, hours) VALUES (?, ?, ?)");
        $stmt->execute([$subject_name, $description, $hours]);

        echo "<p>Mata pelajaran berhasil ditambahkan!</p>";
    }
    ?>

    <a href="index.php">Kembali ke Daftar Kurikulum</a>
</body>
</html>
