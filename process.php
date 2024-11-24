<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = intval($_POST['age']);
    $gender = $_POST['gender'];
    $file = $_FILES['file'];

    $errors = [];
    // Validasi server-side
    if (strlen($name) < 3) {
        $errors[] = "Nama harus memiliki minimal 3 karakter";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid";
    }
    if ($age <= 0) {
        $errors[] = "Umur harus berupa angka positif";
    }
    if ($file['type'] !== 'text/plain') {
        $errors[] = "Hanya file teks yang diperbolehkan";
    }
    if ($file['size'] > 1024 * 1024) {
        $errors[] = "Ukuran file tidak boleh lebih dari 1MB";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        exit;
    }

    // Baca isi file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileRows = explode("\n", $fileContent);

    // Data untuk ditampilkan
    $data = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'gender' => $gender,
        'file' => $fileRows,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    ];

    // Simpan ke session untuk result.php
    session_start();
    $_SESSION['data'] = $data;
    header("Location: result.php");
}
?>
