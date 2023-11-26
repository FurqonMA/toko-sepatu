<div class="container-fluid my-3">
    <div class="row my-4">
        <h1 style="font-family: Poppins; font-weight: 400;  color: #00000070;">Pesanan Saya</h1>
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
              <div class="card-header p-0 border-bottom-0" style="background-color: rgb(32, 32, 32);">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true" style="color: rgb(247, 151, 8); font-weight: 700;">Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false" style="color: rgb(247, 151, 8); font-weight: 700;">Dikemas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false" style="color: rgb(247, 151, 8); font-weight: 700;">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false" style="color: rgb(247, 151, 8); font-weight: 700;">Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table class="table table-bordered table-light table-hover table-striped">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Total Bayar</th>
                        <th>Action</th>
                      </tr>
                      <?php foreach($belum_bayar as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
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
                          <?php if($value->status_bayar==0) { ?>
                            <a href="<?= base_url('halaman_utama/bayar/'. $value->id_transaksi) ?>" class="btn btn-primary btn-flat"><i class="bx bxs-send"></i> Bayar</a>
                          <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                  <table class="table table-bordered table-light table-hover table-striped">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Total Bayar</th>
                      </tr>
                      <?php foreach($diproses as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b><br>                          
                            <span class="badge bg-success text-white" style="font-size: 16px; padding: 5px; width: 120px; margin-left: -2px; margin-top: 8px;">Terverifikasi</span><br>
                            <span class="badge bg-primary text-white" style="font-size: 16px; padding: 6px; width: auto; margin-left: -2px; margin-top: 8px;">Sedang Dikemas</span>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                  <table class="table table-bordered table-light table-hover table-striped">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Total Bayar</th>
                        <th>Nomor Resi</th>
                      </tr>
                      <?php foreach($dikirim as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b><br>                          
                            <span class="badge bg-success text-white" style="font-size: 16px; padding: 5px; width: auto; margin-left: -2px; margin-top: 8px;">Sedang Dikirim</span>
                          </td>
                          <td>
                            <h5>
                              <?= $value->no_resi ?>
                              
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#diterima<?= $value->id_transaksi ?>">
                                Diterima
                              </button>
                            </h5>
                          </td>
                        </tr>
                      <?php } ?>
                     </table>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table table-bordered table-light table-hover table-striped">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Ekspedisi</th>
                        <th>Total Bayar</th>
                        <th>Nomor Resi</th>
                      </tr>
                      <?php foreach($selesai as $key => $value) { ?>
                        <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td><?= $value->ekspedisi ?></td>
                          <td>
                            <b>Rp. <?=number_format($value->total_pesanan, 0,',','.') ?></b>
                          </td>
                          <td>
                            <h5>
                              <?= $value->no_resi ?> 
                                         
                             <span class="badge bg-success text-white" style="font-size: 16px; padding: 5px; width: auto; margin-left: -2px; margin-top: 8px;">Selesai</span>
                            </h5>
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


<!-- Modal -->
<?php foreach($dikirim as $key => $value) { ?>
<div class="modal fade" id="diterima<?= $value->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesanan Diterima</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Apakah Anda Yakin Pesanan Sudah Diterima?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a href="<?= base_url('halaman_utama/diterima/'. $value->id_transaksi) ?>" class="btn btn-primary btn-flat">Ya</a>
      </div>
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
