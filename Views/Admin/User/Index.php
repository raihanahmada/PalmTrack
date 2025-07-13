<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <div class="flex justify-between">
    <h2 class="text-xl font-bold mb-4">Data User</h2>
    <a href="/PalmTrack/admin/tambahUser" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah User</a>
    </div>
    

    <table class="w-full text-sm border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Username</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Role</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="border p-2"><?= $user['name'] ?></td>
                    <td class="border p-2"><?= $user['username'] ?></td>
                    <td class="border p-2"><?= $user['email'] ?></td>
                    <td class="border p-2"><?= $user['role'] ?></td>
                    <td class="border p-2 text-center">
                        <a href="/PalmTrack/admin/editUser/<?= $user['id'] ?>" class="text-blue-600 mr-2">Edit</a>
                        <a href="/PalmTrack/admin/hapusUser/<?= $user['id'] ?>" class="text-red-600" onclick="return confirm('Hapus user ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
