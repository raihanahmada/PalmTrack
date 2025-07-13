<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>
<div class="p-6">

<div class="flex justify-between">
    <h2 class="text-2xl font-bold mb-4">Riwayat Transaksi Pestisida</h2>

<a href="/PalmTrack/admin/tambahTrxPestisida" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Transaksi</a>

</div>

<table class="w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">Tanggal</th>
            <th class="p-2 border">Nama Pestisida</th>
            <th class="p-2 border">Jumlah Pembelian</th>
            <th class="p-2 border">Harga</th>
            <th class="p-2 border">Nama Penjual</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($trx)) : ?>
            <?php foreach ($trx as $item): ?>
                <tr class="border-t">
                    <td class="p-2 border"><?= htmlspecialchars($item['Tanggal']) ?></td>
                    <td class="p-2 border"><?= htmlspecialchars($item['pesticide_name']) ?></td>
                    <td class="p-2 border"><?= $item['jumlahpembelian'] ?></td>
                    <td class="p-2 border">Rp<?= number_format($item['Harga'], 0, ',', '.') ?></td>
                    <td class="p-2 border"><?= htmlspecialchars($item['Namapenjual']) ?></td>
                    <td class="p-2 border">
                        <a href="/PalmTrack/admin/editTrxPestisida/<?= $item['id'] ?>" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="/PalmTrack/admin/hapusTrxPestisida/<?= $item['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center p-4">Tidak ada data transaksi pestisida.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php require __DIR__ . '/../../Layout/Footer.php'; ?>

</div>
