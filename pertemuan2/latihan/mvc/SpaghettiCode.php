<?php
// 1. Koneksi ke Database
$host = "localhost";
$dbname = "mydb";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// 2. Fungsi untuk mendapatkan semua pengguna
function getAllUsers($pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// 3. Fungsi untuk mendapatkan pengguna berdasarkan ID
function getUserById($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// 4. Proses data berdasarkan parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user = getUserById($pdo, $_GET['id']);
    $show_detail = true;
} else {
    $users = getAllUsers($pdo);
    $show_detail = false;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $show_detail ? 'Profil Pengguna' : 'Daftar Pengguna' ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php if ($show_detail): ?>
            <h1>Selamat Datang, <?= htmlspecialchars($user['name']); ?></h1>
            <p>Email: <?= htmlspecialchars($user['email']); ?></p>
            <a href="TanpaMVC.php" class="btn">Kembali ke Daftar</a>
        <?php else: ?>
            <h1>Daftar Pengguna</h1>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['name']); ?></td>
                            <td><?= htmlspecialchars($user['email']); ?></td>
                            <td><a href="TanpaMVC.php?id=<?= $user['id']; ?>" class="btn-small">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>