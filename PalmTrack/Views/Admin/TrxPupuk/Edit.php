<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="container-fluid py-4">
    <h3 class="mb-4">Edit Transaksi Pupuk</h3>

    <form action="/PalmTrack/admin/updateTrxPupuk/<?= $trx['id'] ?>" method="POST">
        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label for="pupuk_id" class="form-label">Nama Pupuk</label>
                    <select name="pupuk_id" id="pupuk_id" class="form-select" required>
                        <option value="" disabled>-- Pilih Pupuk --</option>
                        <?php foreach ($pupuk as $item) : ?>
                            <option value="<?= $item['id'] ?>" <?= $item['id'] == $trx['pupuk_id'] ? 'selected' : '' ?>>
                                <?= $item['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="Tanggal" id="Tanggal" class="form-control" value="<?= $trx['Tanggal'] ?>" required>
                </div>

                <div class="mb-3">
        <label for="jumlahpembelian" class="form-label">Jumlah Pembelian</label>
        <input type="number" name="jumlahpembelian" id="jumlahpembelian" class="form-control" min="1" value="<?= $trx['Jumlahpembelian'] ?>" required>
        </div> <!-- ✅ div ditutup -->


                <div class="mb-3">
                    <label for="Harga" class="form-label">Harga</label>
                    <input type="number" name="Harga" id="Harga" class="form-control" min="0" value="<?= $trx['Harga'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="Namapenjual" class="form-label">Nama Penjual</label>
                    <input type="text" name="Namapenjual" id="Namapenjual" class="form-control" value="<?= $trx['Namapenjual'] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/PalmTrack/admin/trxPupuk" class="btn btn-secondary">Batal</a>

            </div>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
