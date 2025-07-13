<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <div class="flex justify-between">
            <h2 class="text-xl font-bold mb-4">Data Alat</h2>
        <a href="/PalmTrack/admin/tambahAlat" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Alat</a>
    </div>
    <table class="w-full text-sm border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Tipe</th>
                <th class="border p-2">Plat</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alat as $a): ?>
                <tr>
                    <td class="border p-2"><?= $a['name'] ?></td>
                    <td class="border p-2"><?= $a['type'] ?></td>
                    <td class="border p-2"><?= $a['plat_number'] ?></td>
                    <td class="border p-2"><?= $a['description'] ?></td>
                    <td class="border p-2 text-center">
    <a href="/PalmTrack/admin/editAlat/<?= $a['id'] ?>" class="text-blue-600 mr-2">Edit</a>
    <a href="/PalmTrack/admin/hapusAlat/<?= $a['id'] ?>" class="text-red-600">Hapus</a>
</td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
