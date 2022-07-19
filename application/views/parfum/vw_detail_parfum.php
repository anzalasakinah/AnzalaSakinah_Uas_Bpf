<!--Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Parfum
                </div>
                <div class="card-body">
                   

                        <h6 class="card-subtitle mb-2 text-muted"><?= $parfum['merk_parfum']; ?></h6>
                        <div class="row">
                            <div class="col-md-4">Merk Parfum</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $parfum['merk_parfum']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Harum Parfum</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $parfum['harum_parfum']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Stok Parfum</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $parfum['stok']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Diskon</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $parfum['diskon']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Harga</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $parfum['harga']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">Jumlah Terjual</div>
                            <div class="col-md-2">:</div>
                            <div class="col-md-6"><?= $parfum['jumlah_terjual']; ?></div>
                        </div>

                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('Parfum') ?>" class="btn btn-danger">Tutup</a>
                </div>

            </div>

        </div>

        </div></div>
    </div>
</div>
</div>

</div>