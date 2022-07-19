<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="table-responsive">
            <h2 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h2>
            <table class="table">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="" method="POST">
                    <div class="form-floating mb-3">
                        <input type="merk_parfum" name="merk_parfum" value="<?= set_value('merk_parfum')?>" class="form-control" id="merk_parfum" placeholder="Merk Parfum">
                        <?= form_error('merk_parfum','<small class="text-danger p1-3">','</small>')?>
                        <label for="floatingInput">Merk Parfum</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="harum_parfum" name="harum_parfum" value="<?= set_value('harum_parfum')?>" class="form-control" id="harum_parfum" placeholder="Harum Parfum">
                        <?= form_error('harum_parfum','<small class="text-danger p1-3">','</small>')?>
                        <label for="floatingInput">Harum Parfum</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="stok" name="stok" value="<?= set_value('stok')?>" class="form-control" id="stok" placeholder="Stok">
                        <?= form_error('stok','<small class="text-danger p1-3">','</small>')?>
                        <label for="floatingInput">Stok</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="diskon" name="diskon" value="<?= set_value('diskon')?>" class="form-control" id="diskon" placeholder="Diskon Parfum">
                        <?= form_error('diskon','<small class="text-danger p1-3">','</small>')?>
                        <label for="floatingInput">Diskon Parfum</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="harga" name="harga" value="<?= set_value('harga')?>" class="form-control" id="harga" placeholder="Harga">
                        <?= form_error('harga','<small class="text-danger p1-3">','</small>')?>
                        <label for="floatingInput">Harga Parfum</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="jumlah_terjual" name="jumlah_terjual" value="<?= set_value('jumlah_terjual')?>" class="form-control" id="jumlah_terjual" placeholder="Jumlah Terjual">
                        <?= form_error('jumlah_terjual','<small class="text-danger p1-3">','</small>')?>
                        <label for="floatingInput">Jumlah Terjual</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="file" class="form-control" name="gambar" value="<?= set_value('gambar')?>" id="gambar">
                    <?= form_error('gambar','<small class="text-danger p1-3">','</small>')?>
                </div>
                </div>
                </div>
                        <a href=" <?= base_url('Parfum') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Parfum</button>
                </div>
        </div>
    </div>
</div>
</div>
</div>