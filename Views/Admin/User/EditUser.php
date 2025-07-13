<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit User</h2>
    <form action="/PalmTrack/admin/updateUser/<?= $user['id'] ?>" method="post" class="space-y-4">
        <input type="text" name="name" value="<?= $user['name'] ?>" class="w-full border p-2 rounded" required>
        <input type="text" name="username" value="<?= $user['username'] ?>" class="w-full border p-2 rounded" required>
        <input type="email" name="email" value="<?= $user['email'] ?>" class="w-full border p-2 rounded" required>
        <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="w-full border p-2 rounded">
        <select name="role" class="w-full border p-2 rounded" required>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="manager" <?= $user['role'] == 'manager' ? 'selected' : '' ?>>Manager</option>
            <option value="employee" <?= $user['role'] == 'employee' ? 'selected' : '' ?>>Employee</option>
        </select>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
