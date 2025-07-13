<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="container-fluid py-4">
    <h3 class="mb-4">Tambah Transaksi Pestisida</h3>

    <form action="/PalmTrack/admin/simpanTrxPestisida" method="POST">
        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label for="pestisida_id" class="form-label">Nama Pestisida</label>
                    <select name="pestisida_id" id="pestisida_id" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Pestisida --</option>
                        <?php foreach ($pestisida as $item) : ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="Tanggal" id="Tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jumlahpembelian" class="form-label">Jumlah Pembelian</label>
                    <input type="number" name="jumlahpembelian" id="jumlahpembelian" class="form-control" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="Harga" class="form-label">Harga</label>
                    <input type="number" name="Harga" id="Harga" class="form-control" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="Namapenjual" class="form-label">Nama Penjual</label>
                    <input type="text" name="Namapenjual" id="Namapenjual" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/PalmTrack/admin/trxPestisida" class="btn btn-secondary">Batal</a>

            </div>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
