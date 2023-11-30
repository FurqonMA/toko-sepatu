<div class="container-fluid my-5">
    <h4>Keranjang Belanja</h4>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Gambar Produk</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
            <th>Aksi</th>
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
                <td>
                    <a href="<?= base_url('halaman_utama/hapus_item_keranjang/' . $items['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6"></td>
            <td align="right">Rp. <?= number_format($this->cart->total(), 0,',','.')?></td>
            
        </tr>
    </table>
    <div align="right">
        <a href="<?= base_url('halaman_utama/hapus_keranjang')?>"><div class="btn btn-danger btn-sm">Hapus Semua Item</div></a>
        <a href="<?= base_url('welcome/index')?>"><div class="btn btn-primary btn-sm">Lanjutkan Belanja</div></a>
        <a href="<?= base_url('halaman_utama/proses_pesanan')?>"><div class="btn btn-warning btn-sm text-white">Pesanan saya</div></a>
        <a href="<?= base_url('halaman_utama/pembayaran')?>"><div class="btn btn-success btn-sm">Pembayaran</div></a>
        
    </div>
</div>