<style>
input[type=text] {
  background-color: white;
  color: black;
}
</style>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');
            ?>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Merk Parfum</td>
                        <td>Harum Parfum</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Diskon</td>
                        <td>Sub Total</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?= base_url('Profil/transaksi'); ?>" method="POST" enctype="multipart/form-data">
                        <?php
                        function rupiah($angka)
                        {
                            $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                            return $hasil_rupiah;
                        }
                        $i = 1;
                        $total_bayar = 0;
                        $total_p = 0; ?>
                        <?php foreach ($checkout as $us) :
                            $total_bayar += $us['total'];
                        ?>
                            <tr>
                                <td><?= $us['tanggal']; ?></td>
                                <td><?= $us['merk_parfum']; ?></td>
                                <td><?= $us['harum_parfum']; ?></td>
                                <td><?= $us['harga']; ?></td>
                                <td><?= $us['jumlah']; ?></td>
                                <td><?= $us['diskon']; ?></td>
                                <td><?= $us['total']; ?></td>
                                <td><a href="<?= base_url('profil/delcheckout/') . $us['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></a></td>
                            </tr>
                            <input type="hidden" name="parfum[]" value="<?= $us['id_parfum']; ?>">
                            <input type="hidden" name="tanggal" value="<?= date('d/m/Y') ?>">
                            <input type="hidden" name="harga" value="<?= $us['harga']; ?>">
                            <input type="hidden" name="jumlah_p[]" value="<?= $us['jumlah']; ?>">
                            <input type="hidden" name="diskon" value="<?= $us['diskon']; ?>">
                            <input type="hidden" name="total_p[]" value="<?= $us['total']; ?>">
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <td>Nama Pengirim</td>
                            <td colspan="5"><input name="nama_pengirim" type="text" class="form-control" id="no_hp"></td>
                        </tr>
                       
                        <tr>
                            <td>No Hp</td>
                            <td colspan="5"><input name="no_hp" type="text" class="form-control" id="no_hp"></td>
                        </tr>
                        <tr>
                            <td>Alamat Pengiriman</td>
                            <td colspan="5"><input name="alamat" type="text" class="form-control" id="alamat"></td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td colspan="5">
                                <select name="pembayaran" id="pembayaran" class="form-control">
                                    <option value="">Pilih Bank</option>
                                    <option value="BRI">BRI - 1111-11111-11111-1111</option>
                                    <option value="MANDIRI">MANDIRI - 2222-2222-2222</option>
                                    <option value="BNI">BNI - 3333-3333-3333</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bukti Transfer</td>
                            <td colspan="5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                    <label for="gambar" class="custom-file-label">Choose File</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td colspan="5"><input name="keterangan" type="text" class="form-control" id="keterangan"></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"><strong>Total : </strong></td>
                            <td><?= rupiah($total_bayar); ?></td>
                            <td>
                                <input type="hidden" name="no_checkout" value="PJ<?= time() ?>" readonly class="form-control">
                                <input type="hidden" name="total_bayar" value="<?= $total_bayar; ?>">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Pesan</button>
                            </td>
                        </tr>
                    </form>
                </tbody>

            </table>
        </div>
    </div>
</div>