<?php
$dsn = 'sqlite:' . __DIR__ . '/curriculum.db'; // Menghubungkan ke database SQLite
try {
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Membuat tabel mata pelajaran jika belum ada
    $db->exec("CREATE TABLE IF NOT EXISTS subjects (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        subject_name TEXT,
        description TEXT,
        hours INTEGER
    )");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
