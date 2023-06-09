<?php

if (file_exists(__DIR__ . '/../.env')) {
    echo "Proyek Laravel telah diinstal.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir instalasi
    $envData = [
        'APP_NAME' => $_POST['app_name'],
        'APP_ENV' => 'production',
        'APP_KEY' => '',
        'APP_DEBUG' => false,
        'APP_URL' => $_POST['app_url'],
        // Tambahkan konfigurasi lain yang diperlukan
    ];

    // Buat file .env berdasarkan data yang diberikan
    $envContent = '';
    foreach ($envData as $key => $value) {
        $envContent .= $key . '=' . $value . PHP_EOL;
    }
    file_put_contents(__DIR__ . '/../.env', $envContent);

    // Generate kunci aplikasi
    shell_exec('php artisan key:generate');

    echo "Proyek Laravel telah berhasil diinstal.";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Instalasi Proyek Laravel</title>
</head>

<body>
    <h1>Instalasi Proyek Laravel</h1>

    <form method="POST">
        <label for="app_name">Nama Aplikasi:</label>
        <input type="text" name="app_name" id="app_name" required><br>

        <label for="app_url">URL Aplikasi:</label>
        <input type="text" name="app_url" id="app_url" required><br>

        <button type="submit">Instal</button>
    </form>
</body>

</html>