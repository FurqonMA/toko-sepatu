<div class="container-fluid">
    <div class="row">
        <h4>Laporan Penjualan</h4>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-4">
                <h5 class="card-header bg-gradient-primary text-light">Laporan Harian</h5>
                <div class="card-body">
                    <?php echo form_open('admin/laporan/harian') ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <p style="color: #000;">Tanggal</p>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <select name="tanggal" class="form-control">
                                    <?php 
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 31; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <p style="color: #000;">Bulan</p>
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" class="form-control">
                                    <?php 
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <p style="color: #000;">Tahun</p>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php 
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"> Cetak Laporan</i></button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <h5 class="card-header bg-gradient-primary text-light">Laporan Bulanan</h5>
                <div class="card-body">
                <?php echo form_open('admin/laporan/bulanan') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p style="color: #000;">Bulan</p>
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" class="form-control">
                                    <?php 
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p style="color: #000;">Tahun</p>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php 
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"> Cetak Laporan</i></button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <h5 class="card-header bg-gradient-primary text-light">Laporan Tahunan</h5>
                <div class="card-body">
                    <?php echo form_open('admin/laporan/tahunan') ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <p style="color: #000;">Tahun</p>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php 
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 5; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-print"> Cetak Laporan</i></button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>