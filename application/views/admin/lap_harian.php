<section class="content">
      <div class="container-fluid">
    <div class="card">           
        <div class="row">
          <div class="col-12">
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-store"></i> <?= $judul ?>
                    <small class="float-right">Date: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Order</th>
                      <th>Barang</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    $grand_total = 0;
                    foreach ($laporan as $key => $value) { 
                    $tot_harga = $value->qty * $value->harga;
                    $grand_total = $grand_total + $tot_harga;
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $value->no_order ?></td>
                      <td><?= $value->keterangan ?></td>
                      <td>Rp. <?= number_format($value->harga,0) ?></td>
                      <td><?= $value->qty ?></td>
                      <td>Rp. <?= number_format($tot_harga,0) ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <h4>Grand Total : Rp. <?= number_format($grand_total,0) ?></h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
        </div>
        <div class="row no-print mt-4 ml-2">
            <div class="col-12">
              <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>