<div class="container-fluid my-3">
    <div class="row my-4">
        <h1 style="font-family: Poppins; font-weight: 400;  color: #00000070;">Pembayaran</h1>
    </div>
    <div class="row my-4">
        <div class="col-md-6">
            <div class="card my-4">
                <div class="card-header bg-dark text-light">
                    <h4 class="card-title pt-2">Nomor Rekening Toko</h4>
                </div>
                <div class="card-body">
                    <p>Silahkan Transfer Uang Ke Salah Satu Nomor Rekening Dibawah ini Sebesar : <h1 style="color: rgb(236, 160, 46); font-weight: 600;">Rp. <?=number_format($pesanan->total_pesanan, 0,',','.') ?>.-</h1></p> <br>
                    <table class="table table-hover">
                        <tr align="center">
                            <th>Bank</th>
                            <th>Nomor Rekening</th>
                            <th>Atas Nama</th>
                        </tr>
                        <?php foreach($rekening as $key => $value) { ?>
                         <tr align="center">
                            <td><?= $value->nama_bank ?></td>
                            <td><?= $value->no_rek ?></td>
                            <td><?= $value->atas_nama ?></td>
                         </tr>
                        <?php } ?> 
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card my-4">
                <div class="card-header bg-dark text-light">
                    <h4 class="card-title pt-2">Upload Bukti Pembayaran</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php echo form_open_multipart('halaman_utama/bayar/'.$pesanan->id_transaksi); ?>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="atas_nama" class="form-label">Atas Nama</label>
                        <input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Atas Nama...">
                        <?php echo form_error('atas_nama', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="nama_bank" class="form-label">Nama Bank</label>
                        <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank...">
                        <?php echo form_error('nama_bank', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="no_rek" class="form-label">Nomor Rekening</label>
                        <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomor Rekening...">
                        <?php echo form_error('no_rek', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_bayar" class="form-label">Bukti Bayar</label>
                        <input type="file" class="form-control" name="bukti_bayar">
                    
                    <?php if(validation_errors() || isset($upload_error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                        <?php echo isset($upload_error) ? $upload_error : ''; ?>
                    </div>
                <?php endif; ?>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?= base_url('halaman_utama/proses_pesanan') ?>" class="btn btn-secondary">Kembali</a>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
