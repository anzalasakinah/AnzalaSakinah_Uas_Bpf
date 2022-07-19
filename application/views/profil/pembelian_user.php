<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
            <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacinf="0">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>No Checkout</td>
                        <td>Tanggal</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pembelian as $us) : ?>
                        <tr>
                            <td> <?= $i; ?>.</td>
                            <td><?= $us['no_checkout']; ?></td>
                            <td><?= $us['tanggal']; ?></td>
                            <td><?= $us['total_bayar']; ?></td>
                            <td><?= $us['status']; ?></td>
                            <td>

                                <a href="<?= base_url('Profil/statusbeli/') . $us['no_checkout']; ?>" class="btn btn-info">Detail</a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

