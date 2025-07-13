<?php
include_once __DIR__ . '/../Layout/karyawan/Header.php';
include_once __DIR__ . '/../Layout/karyawan/Sidebar.php';

function getStatusBadge($status) {
    switch ($status) {
        case 'diterima':
            return '<span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Diterima</span>';
        case 'ditolak':
            return '<span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Ditolak</span>';
        case 'pending':
            return '<span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span>';
        default:
            return '';
    }
}
?>

<div class="w-full px-4 py-6 md:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Halo, <?= htmlspecialchars($nama_karyawan ?? 'Karyawan') ?>!</h1>
            <p class="text-gray-600 mt-2">Siap untuk melaporkan hasil kerja hari ini? Anda bisa langsung membuat laporan baru.</p>
            <a href="/PalmTrack/karyawan/laporan/create" class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-sm transition duration-200">
                + Buat Laporan Baru
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-800 mb-4">5 Laporan Terakhir Anda</h2>

            <?php
// Judul tampilan berdasarkan type (default fallback pakai ucfirst)
            $judulTipe = [
                'panen' => 'Panen',
                'pupuk' => 'Pemupukan',
                'nyemprot' => 'Penyemprotan',
            ];

            foreach ($laporan_grouped as $tipe => $data_laporan):
                $judul = $judulTipe[$tipe] ?? ucfirst($tipe);
            ?>

                <?php if (!empty($laporan_grouped[$tipe])): ?>
                    <h3 class="text-lg font-semibold mt-4 mb-2"><?= $judul ?></h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left mb-4">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 font-semibold">Tanggal</th>
                                    <th class="p-3 font-semibold">Area</th>
                                    <th class="p-3 font-semibold">Jenis</th>
                                    <?php if ($tipe === 'panen'): ?>
                                        <th class="p-3 font-semibold">Berat</th>
                                    <?php elseif ($tipe === 'pupuk'): ?>
                                        <th class="p-3 font-semibold">Nama Pupuk</th>
                                        <th class="p-3 font-semibold">Qty Pupuk</th>
                                    <?php elseif ($tipe === 'nyemprot'): ?>
                                        <th class="p-3 font-semibold">Nama Pestisida</th>
                                        <th class="p-3 font-semibold">Qty Pestisida</th>
                                    <?php endif; ?>
                                    <th class="p-3 font-semibold text-center">Status</th>
                                    <th class="p-3 font-semibold">Alat</th>
                                    <th class="p-3 font-semibold">Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach ($laporan_grouped[$tipe] as $laporan): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="p-3"><?= date('Y-m-d', strtotime($laporan['datetime'])) ?></td>
                                        <td class="p-3"><?= htmlspecialchars($laporan['area_name']) ?></td>
                                        <td class="p-3"><?= htmlspecialchars($laporan['type']) ?></td>

                                        <?php if ($tipe === 'panen'): ?>
                                            <td class="p-3"><?= $laporan['weight'] ?> Kg</td>
                                        <?php elseif ($tipe === 'pupuk'): ?>
                                            <td class="p-3"><?= $laporan['pupuk_name'] ?? '-' ?></td>
                                            <td class="p-3"><?= $laporan['quantity_of_pupuk'] ?></td>
                                        <?php elseif ($tipe === 'nyemprot'): ?>
                                            <td class="p-3"><?= $laporan['pesticide_name'] ?? '-' ?></td>
                                            <td class="p-3"><?= $laporan['quantity_of_pesticide'] ?></td>
                                        <?php endif; ?>

                                        <td class="p-3 text-center"><?= getStatusBadge($laporan['status']) ?></td>
                                        <td class="p-3"><?= htmlspecialchars($laporan['tools'] ?? '-') ?></td>
                                        <td class="p-3"><?= htmlspecialchars($laporan['rejection_reason'] ?? '-') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <div class="mt-4 text-right">
                <a href="/PalmTrack/karyawan/laporan/history" class="text-blue-600 hover:underline">Lihat Semua Riwayat &rarr;</a>
            </div>
        </div>

    </div>
</div>

<?php include_once __DIR__ . '/../Layout/Footer.php'; ?>
