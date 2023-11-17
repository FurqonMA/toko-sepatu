<div class="container-fluid">
    <div class="row">
        <h4>SETTING</h4>
    </div>
    <div class="card mt-4">
        <h5 class="card-header bg-gradient-primary text-light">Setting Website</h5>
        <div class="card-body">
            <?php 
            if ($this->session->flashdata('pesan')) {
                echo' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    
                    echo $this->session->flashdata('pesan');
                    echo'</h5></div>';                
            }           
            echo form_open('admin/dashboard_admin/setting');  ?>
                <div class="row">
                    <div class="col-sm-6">
                        <p style="color: #000000; font-weight: bold;">Provinsi</p>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="provinsi" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p style="color: #000000; font-weight: bold;">Kabupaten / Kota</p>
                        <div class="form-group">
                            <label>kota</label>
                            <select name="kota" class="form-control">
                                <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" style="color: #000000; font-weight: bold;">Nama Toko</label>
                            <input type="text" name="nama_toko" class="form-control" required value="<?= $setting->nama_toko ?>" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="" style="color: #000000; font-weight: bold;">Nomor Telepon</label>
                            <input type="text" name="no_telpon" class="form-control" required value="<?= $setting->no_telpon ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="" style="color: #000000; font-weight: bold;">Alamat Toko</label>
                            <input type="text" name="alamat_toko" class="form-control" required value="<?= $setting->alamat_toko ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('dashboard_admin') ?>" class="btn btn-success">Kembali</a>
                        </div>
                    </div>
                </div>

            <?php echo form_close() ?>
        </div>
      </div>
</div>


<script>
    $(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        dataType: 'json', // Tentukan tipe data sebagai JSON
        success: function(hasil_provinsi) {
            // console.log(hasil_provinsi);

            // Kosongkan opsi dropdown sebelum menambahkan yang baru
            $("select[name=provinsi]").empty();
            $("select[name=provinsi]").append('<option value="">-- Pilih Provinsi --</option>');

            // Tambahkan opsi dropdown dari data JSON
            $.each(hasil_provinsi.rajaongkir.results, function(index, value) {
                $("select[name=provinsi]").append('<option value="' + value.province_id + '" id_provinsi='+ value.province_id + '>' + value.province + '</option>');
            });
        }
    });
    // masukkan data ke select kota
    $("select[name=provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/kota') ?>",
            data: 'id_provinsi=' + id_provinsi_terpilih,
            success: function(hasil_kota) {
                // console.log(hasil_kota);
                $("select[name=kota]").empty();

                $("select[name=kota]").append('<option value="">-- Pilih Kota --</option>');

                // Tambahkan opsi dropdown dari data JSON
                $.each(hasil_kota.rajaongkir.results, function(index, value) {
                    $("select[name=kota]").append('<option value="' + value.city_id + '">' + value.city_name + '</option>');
                });
            }
        });
    });
    
});

</script>
