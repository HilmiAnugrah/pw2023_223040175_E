<?php 


    //cek apkah tombol submit sudah di clik atau belum
    if (isset($_POST['register'])){
        $username= $_POST['username'];
        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('user baru berhasil di tambahakan');
                    window.location.href = 'dashboard.php?username=$username';
                </script>";
                
        }else{
            echo mysqli_error($conn);
            }
        }
    
?>

<main>
        <div class="container-page">
        <aside class="sidebar">
            <h1>sidebar</h1>
        </aside>
        <section class="login">
            <div class="halaman-log-reg">
            <a href="index.php"><span class="back"><</span> Beranda</a>
            <h1>Register Akun</h1>
            <p>Hi, ayo bergabung menjadi <span class="tag">#jagoan berita</span></p>
            </div>
            <div class="form-log-reg">
                <form action="" method="post"> 
                    <div class="username">
                        <label for="username">Username<span class="required"></span></label>
                        <input type="text" name="username" id="username" placeholder="Email" autofocus>
                    </div>
                    <div class="password">
                        <label for="password">Password<span class="required"></span></label>
                        <input type="password" name="password" id="password" placeholder="**********">
                    </div>
                    <div class="konfirmasi-password">
                        <label for="konfirmasi-password">Konformasi Password<span class="required"></span></label>
                        <input type="password" name="konfirmasi-password" id="konfirmasi-password" placeholder="**********">
                    </div>
                        <div class="button-log-reg">
                        <button type="submit" name="register">REGISTER</button>
                        <p>Sudah punya akun? <a href="login.php">Login</a></p>
                        </div>
                        
                </form>
            </div>
        </section>
        </div>
    </main>