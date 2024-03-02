<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Monthly Report</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style type="text/css">
    @media print {
      body * {
        visibility: hidden;
      }
      .invoice, .invoice * {
        visibility: visible;
      }
    }
  </style>
</head>
<body>
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
                    <small class="float-right"><?= $bulan ?>/<?= $tahun ?></small>
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
                        <th>Tanggal</th>
                        <th>Total Pesanan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $grand_total = 0;
                      foreach ($laporan as $key => $value) { 
                        $grand_total = $grand_total + $value->total_pesanan;
                        ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>Rp. <?= number_format($value->total_pesanan,0) ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <h4>Grand Total : Rp. <?= number_format($grand_total,0) ?></h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>

  <div class="row no-print mt-4 ml-2">
    <div class="col-12">
      <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
    </div>
  </div>

</body>
</html>
