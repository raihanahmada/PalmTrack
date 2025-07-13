<?php require __DIR__ . '/../../Layout/admin/Header.php'; ?>
<?php require __DIR__ . '/../../Layout/admin/Sidebar.php'; ?>

<div class="container-fluid py-4">
    <div class="flex justify-between">
    <h3 class="mb-4 text-2xl font-bold mb-4 ">Riwayat Transaksi Pupuk</h3>
    <a href="/PalmTrack/admin/tambahTrxPupuk" class="btn btn-primary mb-3">+ Tambah Transaksi</a>
    </div>
    

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Pupuk</th>
                        <th>Jumlah Pembelian</th>
                        <th>Harga</th>
                        <th>Nama Penjual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($trx)) : ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data transaksi pupuk.</td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($trx as $item) : ?>
                            <tr>
                                <td><?= $item['Tanggal'] ?></td>
                                <td><?= $item['pupuk_name'] ?></td>
                                <td><?= $item['jumlahpembelian'] ?></td>
                                <td>Rp<?= number_format($item['Harga'], 0, ',', '.') ?></td>
                                <td><?= $item['Namapenjual'] ?></td>
                                <td>
                                    <a href="/PalmTrack/admin/editTrxPupuk/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="/PalmTrack/admin/hapusTrxPupuk/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../Layout/Footer.php'; ?>
