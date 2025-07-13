<?php
include_once __DIR__ . '/../Layout/manager/Header.php';
include_once __DIR__ . '/../Layout/manager/Sidebar.php';
?>

<div class="w-full px-4 py-6 md:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-6">

        <h1 class="text-3xl font-bold text-gray-800">Transaksi Pembelian Pupuk</h1>
        <p class="text-gray-600">Daftar semua transaksi pembelian pupuk dari pemasok.</p>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nama Pupuk</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Jumlah Pembelian</th>
                        <th class="px-4 py-2 border">Harga</th>
                        <th class="px-4 py-2 border">Nama Penjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($trx)) : ?>
                        <?php $i = 1; foreach ($trx as $row) : ?>
                            <tr class="border-t">
                                <td class="px-4 py-2 border"><?= $i++ ?></td>
                                <td class="px-4 py-2 border"><?= htmlspecialchars($row['pupuk_name']) ?></td>
                                <td class="px-4 py-2 border"><?= $row['Tanggal'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['jumlahpembelian'] ?></td>
                                <td class="px-4 py-2 border">Rp <?= number_format($row['Harga'], 0, ',', '.') ?></td>
                                <td class="px-4 py-2 border"><?= $row['Namapenjual'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Belum ada transaksi pupuk.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include_once __DIR__ . '/../Layout/Footer.php'; ?>
