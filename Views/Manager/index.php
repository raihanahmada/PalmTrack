<?php
// --- ASUMSI ---
// Controller Anda (Manager.php) telah menyediakan data berikut:
// $list_area : Array berisi semua area untuk pilihan filter. Contoh: [['id' => 1, 'name' => 'Blok A1'], ['id' => 2, 'name' => 'Blok B2']]
// $grafik_data : Array berisi data untuk ditampilkan di grafik.
//
// Contoh struktur $grafik_data:
// $grafik_data = [
//     'labels' => ['01 Jul', '02 Jul', '03 Jul', '04 Jul', '05 Jul'],
//     'values' => [1200, 1900, 1500, 2100, 1700] // Total berat panen per hari
// ];

// Meng-include layout khusus manager
include_once __DIR__ . '/../Layout/manager/Header.php';
include_once __DIR__ . '/../Layout/manager/Sidebar.php';
?>

<div class="w-full px-4 py-6 md:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">Grafik Hasil Panen</h1>
            <p class="text-gray-600 mt-1">Analisis total berat hasil panen berdasarkan area dan rentang waktu.</p>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-md">
            <form action="" method="GET" class="flex flex-col sm:flex-row items-center gap-4">
                <div>
                    <label for="area_id" class="block text-sm font-medium text-gray-700">Pilih Area</label>
                    <select id="area_id" name="area_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="all">Semua Area</option>
                        <?php if (!empty($list_area)): ?>
                            <?php foreach ($list_area as $area): ?>
                                <option value="<?= $area['id'] ?>"><?= htmlspecialchars($area['name']) ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-2 sm:mt-6">
                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Hasil Panen (dalam Kg)</h2>
            <div>
                <canvas id="harvestChart"></canvas>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Mengambil data dari PHP dan mengubahnya menjadi format yang bisa dibaca JavaScript
    const chartData = <?= json_encode($grafik_data ?? ['labels' => [], 'values' => []]) ?>;

    const ctx = document.getElementById('harvestChart').getContext('2d');
    const harvestChart = new Chart(ctx, {
        type: 'bar', // Tipe grafik: bar, line, pie, dll.
        data: {
            labels: chartData.labels, // Label untuk sumbu X (Tanggal)
            datasets: [{
                label: 'Total Berat Panen (Kg)',
                data: chartData.values, // Nilai untuk sumbu Y (Berat)
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value + ' Kg';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y + ' Kg';
                        }
                    }
                }
            }
        }
    });
});
</script>

<?php
// Meng-include footer umum
include_once __DIR__ . '/../Layout/Footer.php';
?>