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
        <div class="float-right">
            <a href="<?= base_url() ?>Parfum/tambah" class="btn btn-info mb-2">Tambah
                Parfum</a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacinf="0">
                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Merk Parfum</td>
                                            <td>Harum Parfum</td>
                                            <td>Stok</td>
                                            <td>Diskon</td>
                                            <td>Harga</td>
                                            <td>Jumlah Terjual</td>
                                            <td>Gambar</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i = 1; ?>
                                       <?php foreach ($parfum as $us) : ?>
                                        <tr>
                                            <td> <?= $i; ?>.</td>
                                            <td><?= $us['merk_parfum']; ?></td>
                                            <td><?= $us['harum_parfum']; ?></td>
                                            <td><?= $us['stok']; ?></td>
                                            <td><?= $us['diskon']; ?></td>
                                            <td><?= $us['harga']; ?></td>
                                            <td><?= $us['jumlah_terjual']; ?></td>
                                            <td><img src="<?= base_url('assets/img/parfum/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                                        <td>
                                                <a href="<?= base_url('Parfum/hapus/') . $us['id']; ?>" class="btn btn-primary">Hapus</a>
                                                <a href="<?= base_url('Parfum/edit/') . $us['id']; ?>" class="btn btn-info">Edit</a>
                                                <a href="<?= base_url('Parfum/detail/') . $us['id']; ?>" class="btn btn-warning">Detail</a>
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