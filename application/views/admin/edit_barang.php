<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

    <?php foreach($barang as $brg) :?>
        <form action="<?= base_url(). 'admin/data_barang/update/'?>" method="POST">
            <div class="form-group">
                <input type="hidden" name="id_barang" class="form-control" value="<?= $brg->id_barang ?>">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="<?= $brg->nama_barang ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?= $brg->keterangan ?>">
            </div>
            <div class="form-group">
                <label>Olahraga</label>
                <input type="text" name="olahraga" class="form-control" value="<?= $brg->olahraga ?>">
            </div>
            <div class="form-group">
                <label>Brands</label>
                <input type="text" name="brands" class="form-control" value="<?= $brg->brands ?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?= $brg->harga ?>">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control" value="<?= $brg->stok ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>