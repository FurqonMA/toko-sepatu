<div class="container-fluid my-5">
    <h4>Check Out Belanja</h4>
    <div class="card mt-4">
        <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Gambar Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
        </tr>

        <?php
        $no=1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td><?=$no++ ?></td>
                <td><img src="<?= base_url('uploads/' . $items['gambar']) ?>" width="200px" style="margin-left: 20%;"></td>
                <td><?=$items['name'] ?></td>
                <td><?=$items['qty'] ?></td>
                <td align="right">Rp. <?= number_format( $items['price'], 0,',','.')?></td>
                <td align="right">Rp. <?= number_format( $items['subtotal'], 0,',','.')?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5"></td>
            <td align="right"><span id="total_belanjaan_tabel"><?= number_format($this->cart->total(), 0, ',', '.') ?></span></td>
            <input type="hidden" name="total_pesanan" value="<?= $this->cart->total() ?>">
        </tr>

        <!-- <tr>
            <td colspan="5" align="right">Jumlah Ongkir</td>
            <td align="right">Rp. <span id="jumlah_ongkir_tabel"></span></td>
        </tr>
        <tr>
            <td colspan="5" align="right">Total Belanjaan</td>
            <td align="right">Rp. <span id="total_belanjaan_tabel"></span></td>
        </tr> -->
    </table>
        <h4>Input Alamat Pengiriman dan Pembayaran</h5>
        <br>
            <b><p>Alamat Pengirim :</p></b>
            <form method="post" action="<?php echo base_url(). 'halaman_utama/proses_pesanan'?> ">
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kabupaten / Kota</label>
                        <select name="kota" class="form-control"></select>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <b><p>Alamat Penerima :</p></b>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi_penerima" class="form-control"></select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Kabupaten / Kota</label>
                        <select name="kota_penerima" class="form-control"></select>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select name="ekspedisi" id="ekspedisi" class="form-control">
                            <option value="">-- Pilih Ekspedisi --</option>
                            <?php
                            $eks = ['jne' => 'JNE', 'pos' => 'POS', 'tiki' =>'TIKI'];
                            foreach ($eks as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Berat (gram)</label>
                        <input type="text" name="berat" class="form-control" value="<?= $this->input->post('berat') ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group mt-3">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group mt-3">
                        <label>Kode POS</label>
                        <input type="text" name="kode_pos" placeholder="Kode POS Anda" class="form-control">
                    </div>
                </div>
            </div>
                <div class="form-group mt-3">
                    <label>No. Telepon</label>
                    <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label>Nama Penerima</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jumlah Ongkir</label>
                            <input type="text" name="jumlah_ongkir" id="jumlah_ongkir" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                    <a href="<?= base_url('welcome/index')?>"><div class="btn btn-primary">Kembali ke Beranda</div></a>
                    <button class="btn btn-warning text-white" type="submit">Cek Ongkir</button>      
                </div>
            </form>
        </div>
      </div>
</div>
</div>

<script>
     $(document).ready(function() {
        $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        dataType: 'json',
        success: function(hasil_provinsi) {
            $("select[name=provinsi]").empty();
            $("select[name=provinsi]").append('<option value="">-- Pilih Provinsi --</option>');

            $.each(hasil_provinsi.rajaongkir.results, function(index, value) {
                $("select[name=provinsi]").append('<option value="' + value.province_id + '" id_provinsi=' + value.province_id + '>' + value.province + '</option>');
            });
        }
    });
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

    $(document).ready(function() {
        $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        dataType: 'json',
        success: function(hasil_provinsi_penerima) {
            $("select[name=provinsi_penerima]").empty();
            $("select[name=provinsi_penerima]").append('<option value="">-- Pilih Provinsi --</option>');

            $.each(hasil_provinsi_penerima.rajaongkir.results, function(index, value) {
                $("select[name=provinsi_penerima]").append('<option value="' + value.province_id + '" id_provinsi=' + value.province_id + '>' + value.province + '</option>');
            });
        }
    });
}); 
    // masukkan data ke select kota
    $("select[name=provinsi_penerima]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota_penerima) {
                    // console.log(hasil_kota);
                    $("select[name=kota_penerima]").empty();

                    $("select[name=kota_penerima]").append('<option value="">-- Pilih Kota --</option>');

                    // Tambahkan opsi dropdown dari data JSON
                    $.each(hasil_kota_penerima.rajaongkir.results, function(index, value) {
                        $("select[name=kota_penerima]").append('<option value="' + value.city_id + '">' + value.city_name + '</option>');
                    });
                }
            });
            $("form").on("submit", function(event) {
        event.preventDefault(); // Menghentikan pengiriman form bawaan browser
        var formData = $(this).serialize(); // Mengambil data form

        $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/ongkir') ?>", // Ubah menjadi URL yang sesuai
        data: formData,
        dataType: 'json',
        success: function (response) {
            // Ambil nilai ongkir dari respons JSON
            var ongkir = response.rajaongkir.results[0].costs[0].cost[0].value;

            // FORMAT MATA UANG
            var formattedOngkir = formatCurrency(ongkir);

            // Tampilkan nilai ongkir di dalam input dengan id 'jumlah_ongkir'
            $("#jumlah_ongkir").val(formattedOngkir);

            // Ambil nilai total harga pesanan dari input dengan name 'total_pesanan'
            var totalHargaPesanan = parseFloat($("input[name='total_pesanan']").val().replace(/[^\d.-]/g, '')) || 0;

            // Tambahkan ongkir ke totalHargaPesanan
            totalHargaPesanan += ongkir;

            // FORMAT MATA UANG
            var formattedTotalHargaPesanan = formatCurrency(totalHargaPesanan);

            // Tampilkan nilai total belanjaan di dalam input dengan name 'total_belanjaan'
            $("input[name='total_belanjaan']").val(formattedTotalHargaPesanan);

            // Tampilkan nilai total belanjaan di dalam tabel
            $("#jumlah_ongkir_tabel").text(formattedOngkir);
            $("#total_belanjaan_tabel").text(formattedTotalHargaPesanan);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
        }
        });
    });
    function formatCurrency(amount) {
    // Lakukan format dengan menggunakan toLocaleString
    return amount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
}
    });
</script>
