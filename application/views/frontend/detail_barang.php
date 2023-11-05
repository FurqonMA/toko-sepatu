     <div class="container-fluid">
        <div class="titletext">        
            <h3 style="font-family: Poppins; font-weight: 700; color: rgb(61, 58, 58); text-align: center; margin-top: 50px; margin-bottom: -50px;">Preview Produk</h3>
        </div> 
        <div class="img-wrapper" style="background-color: rgb(248, 247, 247); border-radius: 20px;">
            <?php $index = 0; ?>
            <?php foreach($barang as $brg) : ?> 
            <div class="img-container">
                <img class="img-original" src="<?= base_url().'/uploads/'.$brg->gambar ?>" width="500px" height="500px" style="margin-left: 50px;">
                <div class="img-zoom-result" id="img-zoom-<?= $index ?>">
                </div>
            </div>
        </div>
     </div>
     <div class="container mb-5">
        <div class="card">
           <h5 class="card-header">Detail Produk</h5>
           <div class="card-body">
            <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <td>Nama Produk</td>
                        <td><strong><?php echo $brg->nama_barang ?></strong></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><strong><?php echo $brg->keterangan ?></strong></td>
                    </tr>
                    <tr>
                        <td>Jenis Sepatu Olahraga</td>
                        <td><strong><?php echo $brg->olahraga ?></strong></td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><strong><?php echo $brg->stok ?></strong></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><strong style="background-color: rgb(35, 145, 35); padding: 5px; color: #fff; border-radius: 10px; font-size: 15px;">Rp. <?php echo number_format($brg->harga,0,',','.') ?></strong></td>
                    </tr>
                </table>
                <?= anchor('halaman_utama/tambah_keranjang/' .$brg->id_barang, '<div class="btn btn-primary" style="position: relative; left: 0;">Add To Cart</div>') ?>
                <?= anchor('halaman_utama/index/', '<div class="btn btn-secondary" style="position: relative; left: 0;">Kembali</div>') ?>
            </div>
           </div>
         </div>
     </div>
     <?php $index++; ?>
     <?php endforeach; ?>


<script>
function imageZoom(imgClass, resultClass) {
  var containers = document.querySelectorAll(".img-container");

  containers.forEach(function(container, index) {
    var lens, result, cx, cy;
    result = document.getElementById("img-zoom-" + index);

    lens = document.createElement("DIV");
    lens.setAttribute("class", "img-zoom-lens");

    container.appendChild(lens);

    cx = 9.2; // Ubah sesuai preferensi
    cy = 9.2; // Ubah sesuai preferensi

    result.style.backgroundImage = "url('" + container.querySelector("." + imgClass).src + "')";
    result.style.backgroundSize = (container.querySelector("." + imgClass).width * cx) + "px " + (container.querySelector("." + imgClass).height * cy) + "px";

    lens.addEventListener("mousemove", moveLens);
    container.addEventListener("mousemove", moveLens);

    lens.addEventListener("touchmove", moveLens);
    container.addEventListener("touchmove", moveLens);

    container.addEventListener("mouseenter", function() {
      result.style.display = "block";
    });

    container.addEventListener("mouseleave", function() {
      result.style.display = "none";
    });

    function moveLens(e) {
      var pos, x, y;
      pos = getCursorPos(e);
      x = pos.x - (lens.offsetWidth / 2);
      y = pos.y - (lens.offsetHeight / 2);
      if (x > container.querySelector("." + imgClass).width - lens.offsetWidth) { x = container.querySelector("." + imgClass).width - lens.offsetWidth; }
      if (x < 0) { x = 0; }
      if (y > container.querySelector("." + imgClass).height - lens.offsetHeight) { y = container.querySelector("." + imgClass).height - lens.offsetHeight; }
      if (y < 0) { y = 0; }
      lens.style.left = x + "px";
      lens.style.top = y + "px";
      result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    }

    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      a = container.getBoundingClientRect();
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return { x: x, y: y };
    }
  });
}

document.addEventListener("DOMContentLoaded", function() {
  imageZoom("img-original", "img-zoom-result");
});

</script>
