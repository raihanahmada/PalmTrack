<?php
include_once __DIR__ . '/../../Layout/karyawan/Header.php';
include_once __DIR__ . '/../../Layout/karyawan/Sidebar.php';

// Ambil data tools dari model
require_once 'Models/Alat_Model.php';
$toolModel = new Alat_Model();
$tools = $toolModel->getAll();
?>
<div class="p-16 ">
 <h1 class="mb-5 text-2xl font-bold">Form Laporan</h1>   
<div class="p-6 shadow-md bg-white rounded-xl">
    <form action="/PalmTrack/karyawan/simpanLaporan" method="post" class="space-y-4">
        <h1 class="text-1xl font-bold">Tanggal Laporan</h1>
        <input type="date" name="tanggal" required class="w-full border p-2 rounded">
            <h1 class="text-1xl font-bold">Area</h1>
        <select name="area_id" required class="w-full border p-2 rounded">
            <option value="disabled selected">-- Pilih Area --</option>
            <?php
            require_once 'Models/Area_Model.php';
            $areaModel = new Area_Model();
            $areas = $areaModel->getAll();
            foreach ($areas as $area) {
                echo "<option value='{$area['id']}'>{$area['name']}</option>";
            }
            ?>
        </select>

        <label for="jenis" class="block font-bold text-1xl mb-1">Jenis Laporan</label>
<select name="jenis" id="jenis" required class="w-full border px-3 py-2 rounded">
    <option value="" disabled selected>-- Pilih Jenis --</option>
    <option value="panen">Panen</option>
    <option value="pupuk">Pemupukan</option>
    <option value="nyemprot">Penyemprotan</option>

</select>

            <h1 class="text-1xl font-bold">Berat Buah <span class="italic">(Masukkan jika jenis laporan adalah panen)</span></h1>
        <input type="number" name="berat" placeholder="Berat (Kg)" class="w-full border p-2 rounded">
            <h1 class="text-1xl font-bold">Jenis Pupuk yang digunakan <span class="italic">(Masukkan jika jenis laporan adalah memupuk)</span></h1>
        <select name="pupuk_id" class="w-full border p-2 rounded">
            <option value="">-- Pilih Pupuk (Opsional) --</option>
            <?php
            require_once 'Models/Pupuk_Model.php';
            $pupukModel = new Pupuk_Model();
            $pupuks = $pupukModel->getAll();
            foreach ($pupuks as $pupuk) {
                echo "<option value='{$pupuk['id']}'>{$pupuk['name']}</option>";
            }
            ?>
        </select>
        <h1 class="text-1xl font-bold">Jumlah pupuk yang digunakan <span class="italic">(Masukkan jika jenis laporan adalah memupuk)</span></h1>
        <input type="number" name="qty_pupuk" placeholder="Qty Pupuk" class="w-full border p-2 rounded">

        
            <h1 class="text-1xl font-bold">Jenis Pestisida yang digunakan <span class="italic">(Masukkan jika jenis laporan adalah nyemprot)</span></h1>
        <select name="pestisida_id" class="w-full border p-2 rounded">
            <option value="">-- Pilih Pestisida (Opsional) --</option>
            <?php
            require_once 'Models/Pesticide_Model.php';
            $pestisidaModel = new Pesticide_Model();
            $list = $pestisidaModel->getAll();
            foreach ($list as $item) {
                echo "<option value='{$item['id']}'>{$item['name']}</option>";
            }
            ?>
        </select>
            <h1 class="text-1xl font-bold">Jumlah pestisida yang digunakan <span class="italic">(Masukkan jika jenis laporan adalah nyemprot)</span></h1>
        <input type="number" name="qty_pestisida" placeholder="Qty Pestisida" class="w-full border p-2 rounded">
        <!-- Alat bisa pilih lebih dari satu -->
        <label class="block font-bold mb-1 tesx-1xl ">Pilih Alat (bisa lebih dari satu) jika menggunakan alat</label>
    <?php foreach ($tools as $tool): ?>
        <div class="flex items-center">
            <input type="checkbox" name="tool_id[]" value="<?= $tool['id'] ?>" class="mr-2">
            <label><?= htmlspecialchars($tool['name']) ?> (<?= $tool['type'] ?>)</label>
        </div>
    <?php endforeach; ?>

        <textarea name="catatan" placeholder="Catatan (opsional)" class="w-full border p-2 rounded"></textarea>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
    </form>
</div>

<?php include_once __DIR__ . '/../../Layout/Footer.php'; ?>

</div>