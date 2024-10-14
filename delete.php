<?php require 'db.php';

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Menghapus mata pelajaran dari database
$stmt = $db->prepare("DELETE FROM subjects WHERE id = ?");
$stmt->execute([$id]);

echo "<p>Mata pelajaran berhasil dihapus!</p>";
echo "<a href='index.php'>Kembali ke Daftar Kurikulum</a>";
?>
