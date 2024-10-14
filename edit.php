<?php require 'db.php'; 

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Mendapatkan data mata pelajaran berdasarkan ID
$stmt = $db->prepare("SELECT * FROM subjects WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Mata pelajaran tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_name = $_POST['subject_name'];
    $description = $_POST['description'];
    $hours = $_POST['hours'];

    // Memperbarui data mata pelajaran
    $stmt = $db->prepare("UPDATE subjects SET subject_name = ?, description = ?, hours = ? WHERE id = ?");
    $stmt->execute([$subject_name, $description, $hours, $id]);

    echo "<p>Mata pelajaran berhasil diperbarui!</p>";
    echo "<a href='index.php'>Kembali ke Daftar Kurikulum</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Pelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Mata Pelajaran</h1>
    <form action="edit.php?id=<?php echo $row['id']; ?>" method="POST">
        <label for="subject_name">Nama Mata Pelajaran:</label> <br>
        <input type="text" name="subject_name" value="<?php echo htmlspecialchars($row['subject_name']); ?>" required><br><br>

        <label for="description">Deskripsi:</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea><br><br>

        <label for="hours">Jam Pelajaran:</label><br>
        <input type="number" name="hours" value="<?php echo htmlspecialchars($row['hours']); ?>" required><br><br>

        <button type="submit">Perbarui Mata Pelajaran</button>
    </form>

    <a href="index.php">Kembali ke Daftar Kurikulum</a>
</body>
</html>
