<div class="container-fluid">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url() ?>Mahasiswa/tambah" class="btn btn-info mb-2">Tambah
                Mahasiswa</a>
        </div> -->
    <?= $this->session->flashdata('message') ?>
    <div class="clearfix">
        <div class="float-left">
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">
                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>No checkout</td>
                                            <td>Total Bayar</td>
                                            <td>Tanggal</td>
                                            <td>Alamat</td>
                                            <td>Pembayaran</td>
                                            <td>Keterangan</td>
                                            <td>Nama Pengirim</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i = 1; ?>
                                       <?php foreach ($transaksi as $us) : ?>
                                        <tr>
                                            <td> <?= $i; ?>.</td>
                                            <td><?= $us['no_checkout']; ?></td>
                                            <td><?= $us['total_bayar']; ?></td>
                                            <td><?= $us['tanggal']; ?></td>
                                            <td><?= $us['alamat']; ?></td>
                                            <td><?= $us['pembayaran']; ?></td>
                                            <td><?= $us['keterangan']; ?></td>
                                            <td><?= $us['nama_pengirim']; ?></td>
                                        <td>
                                                <a href="<?= base_url('Transaksi/detail')?>?id=<?= $us['no_checkout'];?>" class="btn btn-warning">Detail</a>
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
            <!-- Table End -->