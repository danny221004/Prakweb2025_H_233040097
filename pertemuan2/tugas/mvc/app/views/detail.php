<div class="container mt-4">
    <h1>Profil: <?= htmlspecialchars($user['name']); ?></h1>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>

    <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Kembali ke Daftar</a>
</div>