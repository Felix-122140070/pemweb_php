<?php
session_start();
if (!isset($_SESSION['data'])) {
    echo "Tidak ada data!";
    exit;
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= htmlspecialchars($data['gender']) ?></td>
        </tr>
        <tr>
            <th>Browser/OS</th>
            <td><?= htmlspecialchars($data['user_agent']) ?></td>
        </tr>
    </table>

    <h3 style="text-align: center;">Isi File</h3>
    <table>
        <tr>
            <th>Baris</th>
            <th>Isi</th>
        </tr>
        <?php foreach ($data['file'] as $index => $line): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
