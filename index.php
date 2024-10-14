<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kurikulum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Mata Pelajaran Kurikulum</h1>

    <table>
        <tr>
            <th>Nama Mata Pelajaran</th>
            <th>Deskripsi</th>
            <th>Jam Pelajaran</th>
            <th>Aksi</th>
        </tr>

        <?php
        // Mengambil semua mata pelajaran dari database
        $stmt = $db->query("SELECT * FROM subjects");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['subject_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td>" . htmlspecialchars($row['hours']) . "</td>";
            echo "<td>";
            echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus mata pelajaran ini?\");'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="add.php">Tambah Mata Pelajaran</a>
</body>
</html>

