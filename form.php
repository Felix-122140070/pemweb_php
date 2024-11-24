<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const age = document.getElementById('age').value.trim();
            const file = document.getElementById('file').files[0];

            if (name.length < 3) {
                alert('Nama harus memiliki minimal 3 karakter');
                return false;
            }
            if (!email.includes('@')) {
                alert('Email tidak valid');
                return false;
            }
            if (isNaN(age) || age <= 0) {
                alert('Umur harus berupa angka positif');
                return false;
            }
            if (!file) {
                alert('File harus diupload');
                return false;
            }
            if (file.type !== 'text/plain') {
                alert('Hanya file teks yang diperbolehkan');
                return false;
            }
            if (file.size > 1024 * 1024) {
                alert('Ukuran file tidak boleh lebih dari 1MB');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>FORMULIR TEXT</h1>
    <div class="form-container">
        <form action="process.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="age">Umur:</label>
            <input type="number" id="age" name="age" required>
            
            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            
            <label for="file">Upload File (Teks):</label>
            <input type="file" id="file" name="file" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
