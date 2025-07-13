<?php
include_once __DIR__ . '/../Layout/manager/Header.php';
include_once __DIR__ . '/../Layout/manager/Sidebar.php';
?>

<div class="w-full px-4 py-6 md:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-6">

        <h1 class="text-3xl font-bold text-gray-800">Data Stok Pestisida</h1>
        <p class="text-gray-600">Berikut adalah daftar semua pestisida yang tersedia dalam sistem.</p>

        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Nama Pestisida</th>
                        <th class="px-4 py-2 border">Deskripsi</th>
                        <th class="px-4 py-2 border">Stok (Satuan)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pestisida)) : ?>
                        <?php $i = 1; foreach ($pestisida as $item) : ?>
                            <tr class="border-t">
                                <td class="px-4 py-2 border"><?= $i++ ?></td>
                                <td class="px-4 py-2 border"><?= htmlspecialchars($item['name']) ?></td>
                                <td class="px-4 py-2 border"><?= htmlspecialchars($item['description']) ?></td>
                                <td class="px-4 py-2 border"><?= $item['stock'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Data pestisida belum tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include_once __DIR__ . '/../Layout/Footer.php'; ?>
