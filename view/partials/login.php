<main>
        <div class="container-page">
        <aside class="sidebar">
            <h1>sidebar</h1>
        </aside>
        <section class="login">
            <div class="halaman-log-reg">
            <a href="index.php">< Beranda</a>
            <h1>Log In Akun</h1>
            <p>Hi, ayo bergabung menjadi <span class="tag">#jagoan berita</span></p>
            </div>
            <div class="form-log-reg">
                <?php if(isset($error)): ?>
                    <p style="color:red; font-style:italic;">username/password salah</p>
                    <?php endif; ?>
                    <?php if(isset($require)): ?>
                    <p style="color:red; font-style:italic;">Kamu Belum Login!!</p>
                    <?php endif; ?>
                <form action="" method="post">
                    <div class="username">
                        <label for="username">Username<span class="required"></span></label>
                        <input type="text" name="username" id="username" placeholder="Email/Username" autofocus required>
                    </div>
                    <div class="password">
                        <label for="password">Password<span class="required"></span></label>
                        <input type="password" name="password" id="password" placeholder="**********" required>
                    </div>
                    <div class="rememberme">
                        <input type="checkbox" name="remember" id="remember" placeholder="**********">
                        <label for="remember">Remember me<span class="required"></span></label>
                    </div>
                        <div class="button-log-reg">
                        <button type="submit" name="login">LOGIN</button>
                        <p>belum punya akun? <a href="register.php">Register</a></p>

                        </div>
                        
                </form>
            </div>
        </section>
        </div>
    </main>