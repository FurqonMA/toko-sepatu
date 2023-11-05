<section class="loginpage" style="  background: url('../assets/img/background.jpg') no-repeat; background-size: cover; background-position: center;">
    <div class="wrapper">
        <form action="">
            <h1>LOGIN</h1>
            <div class="input-boxx">
                <input type="text" name="" id="" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-boxx">
                <input type="password" name="" id="" placeholder="Password" required>
                <i class='bx bxs-lock'></i>
            </div>
    
            <div class="remember-forgot">
                <label for=""><input type="checkbox">Remember me</label>
            </div>
    
            <button class="btn" type="submit">Login</button>
    
            <div class="register-link">
                <p>Belum mempunyai akun? <a href="<?=base_url();?>register_page/index">Register</a></p>
            </div>
            <div class="back">
                <a href="<?=base_url();?>halaman_utama/index">Back to Home</a>
            </div>
        </form>
    </div>
</section>
