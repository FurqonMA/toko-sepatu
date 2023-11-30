<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah Barang</button>
    <?php echo anchor('admin/data_barang/hapus_semua_data', '<button class="btn btn-sm btn-danger mb-3"><i class="fas fa-trash"></i> Hapus Semua Data</button>', 'onclick="return confirm(\'Apakah Anda yakin ingin menghapus semua data?\');"') ?>
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA BARANG</th>
                                        <th>GAMBAR</th>
                                        <th>KETERANGAN</th>
                                        <th>OLAHRAGA</th>
                                        <th>BRANDS</th>
                                        <th>HARGA</th>
                                        <th>STOK</th>
                                        <th colspan="3">AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no=1;
                                    foreach($barang as $brg) : ?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td><?= $brg->nama_barang ?></td>
                                            <td><img src="<?=base_url();?>/uploads/<?= $brg->gambar ?>" width="50"></td>
                                            <td><?= $brg->keterangan ?></td>
                                            <td><?= $brg->olahraga ?></td>
                                            <td><?= $brg->brands ?></td>
                                            <td><?= $brg->harga?></td>
                                            <td><?= $brg->stok?></td>
                                            <td><?= anchor('admin/data_barang/edit/' .$brg->id_barang, '<div class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
                                            <td><?= anchor('admin/data_barang/hapus/' .$brg->id_barang, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(). 'admin/data_barang/tambah_aksi';?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control">
            </div>
             <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label>Olahraga</label>
                <input type="text" name="olahraga" class="form-control">
            </div>
             <div class="form-group">
                <label>Brands</label>
                <input type="text" name="brands" class="form-control">
            </div>
             <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="text" name="stok" class="form-control">
            </div>
            <div class="form-group">
                <label>Gambar Barang</label>
                <input type="file" name="gambar" class="form-control">
            </div>

          
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>