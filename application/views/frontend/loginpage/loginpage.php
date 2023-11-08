<section class="loginpage" style="  background: url('../assets/img/background.jpg') no-repeat; background-size: cover; background-position: center;">
    <div class="wrapper">
        <form action="<?php echo base_url('auth/login') ?>" method="POST">
            <h1>LOGIN</h1>
            <?php echo $this->session->flashdata('error') ?>
            <?php echo $this->session->flashdata('pesan') ?>  
            <?php echo $this->session->flashdata('daftar') ?>  
            <div class="input-boxx">
                <input type="text" name="username" id="" placeholder="Username">                
                <?php echo form_error('username','<div class=" text-sm ml-2" style="color: red;">','</div>')?>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-boxx">
                <input type="password" name="password" id="" placeholder="Password">
                <?php echo form_error('password','<div class="text-sm ml-2" style="color: red;">','</div>')?>
                <i class='bx bxs-lock'></i>
            </div>
    
            <button class="btn" type="submit">Login</button>
    
            <div class="register-link">
                <p>Belum mempunyai akun? <a href="<?=base_url();?>register_page/index">Daftar</a></p>
            </div>
            <div class="back">
                <a href="<?=base_url();?>halaman_utama/index">Back to Home</a>
            </div>
        </form>
    </div>
</section>
