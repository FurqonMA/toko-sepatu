
<nav>
  <div class="navbar">
    <i class='bx bx-menu'></i>
    <div class="logo">
    <a href="<?=base_url();?>halaman_utama/index"> <img src="<?=base_url();?>/assets/img/logotoko.png" alt="AthleticXpress logo"></a>
    </div>
    <div class="nav-links">
      <div class="sidebar-logo">
        <span class="logo_name" style="font-style: italic;">Ath<span style="color: rgb(255, 159, 80);">X</span></span>
        <i class='bx bx-x'></i>
      </div>
      <ul class="links">
         <li>
          <a href="<?=base_url();?>halaman_utama/index">Home</a>
          <div class="bunder"></div>
        </li>
         <li>
          <a href="#">Olahraga</a>
          <i class='bx bxs-chevron-down arrow olahraga-arrow'></i>
          <ul class="olahraga-sub-menu sub-menu">
              <li><a href="#">Sepak Bola</a></li>
              <li><a href="#">Futsal</a></li>
              <li><a href="#">Basket</a></li>
              <li><a href="#">Running</a></li>
          </ul>
         </li>
         <li>
          <a href="#">Brands</a>
          <i class='bx bxs-chevron-down arrow brands-arrow'></i>
          <ul class="brands-sub-menu sub-menu">
            <li><a href="#">Adidas</a></li>
            <li><a href="#">Nike</a></li>
            <li><a href="#">Ortuseight</a></li>
            <li><a href="#">Reebok</a></li>
            <li><a href="#">Mizuno</a></li>
            <li><a href="#">Air Jordan</a></li>
        </ul>
         </li>
         <!-- <li>
          <a class="sale" style="color: white; background-color: red; width: 60px; height: 63px; margin-bottom: 3px; display: flex; align-items: center; padding-left: 12px; border-radius: 10px;" href="#">Sale</a>
         </li> -->
         <li>
          <a href="<?=base_url();?>loginpage/index">Login | Register</a>
         </li>
         <li>
          <?php
          $keranjang = '<span style="color: white;">Keranjang : '. $this->cart->total_items().'</span>';
          ?>

          <?= anchor('halaman_utama/detail_keranjang', $keranjang)?>
         </li>
         <li>
          <div class="search-box">
            <i class='bx bx-search'></i>
            <div class="input-box">
              <input type="text" placeholder="Cari apa brosist?...">
            </div>
          </div>
         </li>
      </ul>
    </div>
  </div>
</nav>

