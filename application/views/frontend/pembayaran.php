<div class="container-flui my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success text-center">
                <?php 
                $grand_total = 0;
                if ($keranjang = $this->cart->contents())
                {
                    foreach ($keranjang as $item){
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4 style='padding-top:10px;'>Total belanja Anda: Rp.".number_format($grand_total,0,',','.');
                ?>
            </div><br><br>
                <h3>Input Alamat Pengiriman dan Pembayaran</h3>

                <form method="post" action="<?php echo base_url(). 'halaman_utama/proses_pesanan'?> ">
                    <div class="form-group mt-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label>No. Telepon</label>
                        <input type="text" name="no_telp" placeholder="Nomor Telepon Anda" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label>Jasa Pengiriman</label>
                        <select class="form-control">
                            <option>JNE</option>
                            <option>JNT</option>
                            <option>POS Indonesia</option>
                            <option>TIKI</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label>Pilih BANK</label>
                        <select class="form-control">
                            <option>BCA - XXXXXXX</option>
                            <option>BNI - XXXXXXX</option>
                            <option>BRI - XXXXXXX</option>
                            <option>MANDIRI - XXXXXXX</option>
                        </select>
                    </div>
                    <button class="btn btn-sm btn-primary mt-3" type="submit">Pesan</button>
                </form>
                <?php
                    }else {
                        echo "<h4 style='padding:10px;'>Pesanan Anda masih kosong!";
                    }
                ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>