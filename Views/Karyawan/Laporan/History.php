<?php include_once __DIR__ . '/../../Layout/karyawan/Header.php'; ?>
<?php include_once __DIR__ . '/../../Layout/karyawan/Sidebar.php'; ?>
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Riwayat Laporan</h2>

    <?php foreach (['panen' => 'Panen', 'pupuk' => 'Pemupukan', 'nyemprot' => 'Penyemprotan', 'pupuk&nyemprot' => 'Pupuk & Nyemprot'] as $typeKey => $typeLabel): ?>
        <?php if (!empty($laporan[$typeKey])): ?>
            <h3 class="text-xl font-bold mt-6 mb-2"><?= $typeLabel ?></h3>
            <table class="table-auto w-full border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Area</th>
                        <th class="px-4 py-2">Jenis</th>

                        <?php if ($typeKey === 'panen'): ?>
                            <th class="px-4 py-2">Berat</th>
                        <?php elseif ($typeKey === 'pupuk'): ?>
                            <th class="px-4 py-2">Nama Pupuk</th>
                            <th class="px-4 py-2">Qty Pupuk</th>
                        <?php elseif ($typeKey === 'nyemprot'): ?>
                            <th class="px-4 py-2">Nama Pestisida</th>
                            <th class="px-4 py-2">Qty Pestisida</th>
                        <?php elseif ($typeKey === 'pupuk&nyemprot'): ?>
                            <th class="px-4 py-2">Nama Pupuk</th>
                            <th class="px-4 py-2">Qty Pupuk</th>
                            <th class="px-4 py-2">Nama Pestisida</th>
                            <th class="px-4 py-2">Qty Pestisida</th>
                        <?php endif; ?>

                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Alat</th>
                        <th class="px-4 py-2">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($laporan[$typeKey] as $lapor): ?>
                        <tr class="border-t">
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['datetime']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['area_name']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['type']) ?></td>

                            <?php if ($typeKey === 'panen'): ?>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['weight']) ?> Kg</td>
                            <?php elseif ($typeKey === 'pupuk'): ?>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['pupuk_name'] ?? '-') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['quantity_of_pupuk'] ?? '-') ?></td>
                            <?php elseif ($typeKey === 'nyemprot'): ?>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['pesticide_name'] ?? '-') ?></td>
                                <td class="px-4 py-2"><?= htmlspecialchars($lapor['quantity_of_pesticide'] ?? '-') ?></td>
                           
                            <?php endif; ?>

                            <td class="px-4 py-2"><?= ucfirst($lapor['status']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['tools'] ?? '-') ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($lapor['rejection_reason'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php include_once __DIR__ . '/../../Layout/Footer.php'; ?>
