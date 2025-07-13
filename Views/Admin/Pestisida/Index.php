<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <div class="flex justify-between">
 <h2 class="text-xl font-bold mb-4">Data Pestisida</h2>
    <a href="/PalmTrack/admin/tambahPestisida" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Pestisida</a>

    </div>
   
    <table class="w-full text-sm border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pestisida as $p): ?>
                <tr>
                    <td class="border p-2"><?= $p['name'] ?></td>
                    <td class="border p-2"><?= $p['description'] ?></td>
                    <td class="border p-2"><?= $p['stock'] ?></td>
                    <td class="border p-2 text-center">
                        <a href="/PalmTrack/admin/editPestisida/<?= $p['id'] ?>" class="text-blue-600">Edit</a> |
                        <a href="/PalmTrack/admin/hapusPestisida/<?= $p['id'] ?>" class="text-red-600">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
