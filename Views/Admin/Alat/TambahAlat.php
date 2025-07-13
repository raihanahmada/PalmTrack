<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Alat</h2>
    <form action="/PalmTrack/admin/simpanAlat" method="post" class="space-y-4">
        <input type="text" name="name" placeholder="Nama Alat" class="w-full border p-2 rounded" required>
        <input type="text" name="type" placeholder="Tipe" class="w-full border p-2 rounded" required>
        <input type="text" name="plat_number" placeholder="Plat Nomor" class="w-full border p-2 rounded">
        <textarea name="description" placeholder="Deskripsi" class="w-full border p-2 rounded"></textarea>
        <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
