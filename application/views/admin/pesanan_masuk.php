<div class="container-fluid my-3">
    <div class="row my-4">
        <h1 style="font-family: Poppins; font-weight: 400;  color: #00000070;">Pesanan Masuk</h1>
    </div>
    <?php if ($this->session->flashdata('pesan')): ?>
      <div class="alert alert-success" role="alert">
          <?= $this->session->flashdata('pesan'); ?>
      </div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('bukti')): ?>
      <div class="alert alert-success" role="alert">
          <?= $this->session->flashdata('bukti'); ?>
      </div>
  <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0 bg-gradient-primary" >
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true" style=" font-weight: 700;">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false" style="font-weight: 700;">Dikemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false" style=" font-weight: 700;">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false" style=" font-weight: 700;">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table class="table table-bordered  table-hover ">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Alamat</th>
                        <th>Total Bayar</th>
                        <th>Keterangan Barang</th>
                        <th></th>
                      </tr>
                      <?php foreach($pesanan as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td><?= $value->alamat ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b><br>
                           <?php if($value->status_bayar==0) { ?>
                            <span class="badge bg-warning text-white" style="font-size: 16px; padding: 5px; width: 120px; margin-left: -2px; margin-top: 8px;">Belum Bayar</span><br>
                          <?php }else { ?>
                            <span class="badge bg-success text-white" style="font-size: 16px; padding: 5px; width: 120px; margin-left: -2px; margin-top: 8px;">Sudah Bayar</span><br>
                            <span class="badge bg-primary text-white" style="font-size: 16px; padding: 6px; width: auto; margin-left: -2px; margin-top: 8px;">Menunggu Verifikasi</span>
                          <?php } ?>
                          </td>
                        <td>
                            <?php
                            // Ambil data rincian berdasarkan no_order
                            $rincian_pesanan = $this->model_transaksi->get_rincian_info($value->no_order);
                            foreach ($rincian_pesanan as $rincian) {
                                echo $rincian->keterangan . "<br>";
                            }
                            ?>
                        </td>
                          <td>
                          <?php if($value->status_bayar ==1) { ?>
                            <a href="<?= base_url('admin/dashboard_admin/proses/'. $value->id_transaksi) ?>" class="btn btn-sm btn-primary btn-flat">Verifikasi</a><br>
                            <button class="btn btn-success btn-sm btn-flat mt-2" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti</button>
                          <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <table class="table table-bordered  table-hover ">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Alamat</th>
                        <th>Total Bayar</th>
                        <th>Keterangan Barang</th>
                        <th></th>
                      </tr>
                      <?php foreach($pesanan_diproses as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td><?= $value->alamat ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b><br>
                            <span class="badge bg-primary text-white" style="font-size: 16px; padding: 5px; width: auto; margin-left: -2px; margin-top: 8px;">Diproses/Dikemas</span>
                          </td>
                          <td>
                            <?php
                            // Ambil data rincian berdasarkan no_order
                            $rincian_pesanan = $this->model_transaksi->get_rincian_info($value->no_order);
                            foreach ($rincian_pesanan as $rincian) {
                                echo $rincian->keterangan . "<br>";
                            }
                            ?>
                        </td>
                          <td>
                          <?php if($value->status_bayar ==1) { ?>
                           <button  class="btn btn-primary btn-flat ml-5 mt-1" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class='fas fa-truck'></i> Kirim</button>
                          <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table table-bordered  table-hover ">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Alamat</th>
                        <th>Total Bayar</th>
                        <th>Keterangan Barang</th>

                        <th>Nomor Resi</th>
                      </tr>
                      <?php foreach($pesanan_dikirim as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td><?= $value->alamat ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b><br>
                            <span class="badge bg-success text-white" style="font-size: 16px; padding: 5px; width: auto; margin-left: -2px; margin-top: 8px;">Dikirim</span>
                          </td>
                          <td>
                            <?php
                            // Ambil data rincian berdasarkan no_order
                            $rincian_pesanan = $this->model_transaksi->get_rincian_info($value->no_order);
                            foreach ($rincian_pesanan as $rincian) {
                                echo $rincian->keterangan . "<br>";
                            }
                            ?>
                        </td>
                          <td>
                            <?= $value->no_resi ?>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                  <table class="table table-bordered  table-hover ">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Alamat</th>
                        <th>Total Bayar</th>
                        <th>Keterangan Barang</th>
                        <th>Nomor Resi</th>
                      </tr>
                      <?php foreach($pesanan_selesai as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td><?= $value->alamat ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b>
                          </td>
                          <td>
                            <?php
                            // Ambil data rincian berdasarkan no_order
                            $rincian_pesanan = $this->model_transaksi->get_rincian_info($value->no_order);
                            foreach ($rincian_pesanan as $rincian) {
                                echo $rincian->keterangan . "<br>";
                            }
                            ?>
                        </td>
                          <td>
                            <?= $value->no_resi ?><br>
                            <span class="badge bg-success text-white" style="font-size: 16px; padding: 5px; width: auto; margin-left: -2px; margin-top: 8px;">Pesanan Telah Diterima</span>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</div>

 <?php foreach($pesanan as $key => $value) { ?>

  <!-- Modal -->
  <div class="modal fade" id="cek<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cek Bukti Bayar No Order : <?= $value->no_order ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
                <th>Nama Bank</th>
                <th>:</th>
                <td><?= $value->nama_bank ?></td>
            </tr>
            <tr>
                <th>Nomor Rekening</th>
                <th>:</th>
                <td><?= $value->no_rek ?></td>
            </tr>
            <tr>
                <th>Atas Nama</th>
                <th>:</th>
                <td><?= $value->atas_nama ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?= $value->alamat ?></td>
            </tr>
            <tr>
                <th>Total Bayar</th>
                <th>:</th>
                <td>Rp. <?=number_format($value->total_pesanan, 0,',','.')  ?></td>
            </tr>
          </table><br>
          <img src="<?= base_url('assets/bukti_bayar/'.$value->bukti_bayar) ?>"class="img-fluid pad">
        </div>
      </div>
    </div>
  </div>

<?php } ?>

<?php foreach($pesanan_diproses as $key => $value) { ?>
<!-- Modal -->
<div class="modal fade" id="kirim<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $value->no_order ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/dashboard_admin/kirim/'.$value->id_transaksi) ?>

        <table class="table">
          <tr>
            <th>Nama Penerima</th>
            <th>:</th>
            <td><?= $value->nama_penerima ?></td>
          </tr>
          <tr>
            <th>Alamat Lengkap Penerima</th>
            <th>:</th>
            <td><?= $value->alamat ?></td>
          </tr>
          <tr>
            <th>Ekspedisi</th>
            <th>:</th>
            <td><?= $value->ekspedisi ?></td>
          </tr>
          <tr>
            <th>Total Pesanan</th>
            <th>:</th>
            <td>Rp. <?=number_format( $value->total_pesanan, 0,',','.') ?></td>
          </tr>
          <tr>
            <th>Nomor Resi</th>
            <th>:</th>
            <td><input type="text" name="no_resi" class="form-control" placeholder="nomor resi..." required></td>
          </tr>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>
<?php } ?>


<script>
    $(document).ready(function(){
        $('#custom-tabs-four-tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    });
    // $(document).ready(function(){
    //     // Sembunyikan alert saat halaman selesai dimuat
    //     $('.alert').hide();

    //     $('#custom-tabs-four-tab a').on('click', function (e) {
    //         e.preventDefault();
    //         $(this).tab('show');
    //         // Sembunyikan alert ketika tab diubah
    //         $('.alert').hide();
    //     });
    // });
</script>
