<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">DATA TABLE PARFUM</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Merk Parfum</td>
                            <td>Harum Parfum</td>
                            <td>Stok</td>
                            <td>Diskon</td>
                            <td>Harga</td>
                            <td>Jumlah_terjual</td>
                            <td>Gambar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                    foreach($parfum as $i):
                        
                $id=$i['id'];
                $merk_parfum=$i['merk_parfum'];
                $harum_parfum=$i['harum_parfum'];
                $stok=$i['stok'];
                $diskon=$i['diskon'];
                $harga=$i['harga'];
                $jumlah_terjual=$i['jumlah_terjual'];
                $gambar=$i['gambar'];
?>
                        <tr>
                            <td><?php echo $id;?> </td>
                            <td><?php echo $merk_parfum;?> </td>
                            <td><?php echo $harum_parfum;?> </td>
                            <td><?php echo $stok;?> </td>
                            <td><?php echo $diskon;?> </td>
                            <td><?php echo $harga;?> </td>
                            <td><?php echo $jumlah_terjual;?> </td>
                            <td><img src="<?= base_url('assets/img/parfum/') . $i['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"> </script>

            <script src="<?php echo base_url().'assets/js/bootstrap.js'?>"> </script>

            <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"> </script>

            <script src="<?php echo base_url().'assets/js/moment.js'?>"> </script>

            <script>
            $(document).ready(function() {
                $('#mydata').DataTable();
            });
            </script>
            </body>

            </html>