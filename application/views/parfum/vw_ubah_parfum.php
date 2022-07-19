<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <div class="table-responsive">
            <h2 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h2>
            <table class="table">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $parfum['id']; ?>">
                        <div class=" form-floating mb-3">
                        <input type="merk_parfum" name="merk_parfum" value="<?= $parfum['merk_parfum'];?>" class="form-control" id="merk_parfum" placeholder="Merk Parfum">
                            <label for="floatingInput">Merk Parfum</label>
                            <?= form_error('merk_parfum','<small class="text-danger p1-3">','</small>')?>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="harum_parfum" name="harum_parfum" value="<?= $parfum['harum_parfum'];?>" class="form-control" id="harum_parfum" placeholder="Harum Parfum">
                            <label for="floatingInput">Harum Parfum</label>
                            <?= form_error('harum_parfum','<small class="text-danger p1-3">','</small>')?>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="stok" name="stok" value="<?= $parfum['stok'];?>" class="form-control" id="stok" placeholder="Stok">
                            <label for="floatingPassword">Stok</label>
                            <?= form_error('stok','<small class="text-danger p1-3">','</small>')?>    
                        </div>
                        <div class="form-floating mb-3">
                        <input type="diskon" name="diskon" value="<?= $parfum['diskon'];?>" class="form-control" id="diskon" placeholder="Diskon Parfum">
                            <label for="floatingPassword">Diskon</label>
                            <?= form_error('diskon','<small class="text-danger p1-3">','</small>')?>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="harga" name="harga" value="<?= $parfum['harga'];?>" class="form-control" id="harga" placeholder="Harga">
                            <label for="floatingInput">Harga</label>
                            <?= form_error('harga','<small class="text-danger p1-3">','</small>')?>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="jumlah_terjual" name="jumlah_terjual" value="<?= $parfum['jumlah_terjual'];?>" class="form-control" id="jumlah_terjual" placeholder="Jumlah Terjual">
                            <label for="floatingInput">Jumlah Terjual</label>
                            <?= form_error('jumlah_terjual','<small class="text-danger p1-3">','</small>')?>
                        </div>
                        <div class="form-floating mb-3">
                            <img src="<?= base_url('assets/img/parfum/'). $parfum['gambar'];?>" style="width: 100;" class="img-thumbnail">
                        <input type="file" class="form-control" name="gambar" value="<?= $parfum['gambar'];?>" id="gambar">
                    <?= form_error('gambar','<small class="text-danger p1-3">','</small>')?>
                </div>
                        <a href=" <?= base_url('Parfum') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data Parfum</button>
                </div>
        </div>
    </div>
</div>
</div>
</div>