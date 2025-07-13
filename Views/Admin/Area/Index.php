<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <div class="flex justify-between">
        <h2 class="text-xl font-bold mb-4">Data Area</h2>
    <a href="/PalmTrack/admin/tambahArea" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Area</a>

    </div>
    
    <table class="w-full text-sm border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2">Jumlah Pohon</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($area as $a): ?>
                <tr>
                    <td class="border p-2"><?= $a['name'] ?></td>
                    <td class="border p-2"><?= $a['size'] ?></td>
                    <td class="border p-2"><?= $a['quantity_of_trees'] ?></td>
                    <td class="border p-2 text-center">
    <a href="/PalmTrack/admin/editArea/<?= $a['id'] ?>" class="text-blue-600 mr-2">Edit</a>
    <a href="/PalmTrack/admin/hapusArea/<?= $a['id'] ?>" class="text-red-600">Hapus</a>
</td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
