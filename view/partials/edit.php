<section class="form-edit" id="form-edit">
<div class="judul-container">
    <h2>Ubah Data User</h2>
</div>

<form action="" method="post">
                <div class="inputan-user">
                    <div class="username">
                        <label for="username">Username<span class="required"></span></label>
                        <?php if(isset($notSpasi)): ?>
                            <p style="color:red; font-style:italic;">Username tidak boleh mengandung spasi!!</p>
                        <?php endif; ?>
                        <input type="text" name="username" id="username" placeholder="Nama Anda" autofocus required>
                    </div>
                    <div class="email">
                        <label for="email">Email<span class="required"></span></label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
       
                    <div class="password">
                        <label for="password">Password<span class="required"></span></label>
                        <input type="password" name="password" id="password" placeholder="**********" required>
                    </div>
                    <div class="konfirmasi-password">
                        <label for="konfirmasi-password">Konformasi Password<span class="required"></span></label>
                        <input type="password" name="konfirmasi-password" id="konfirmasi-password" placeholder="**********" required>
                    </div>
                    </div>
                    <div class="button-log-reg">
                    <button type="submit" name="ubah">Ubah Data</button>
                    </div>
                </form>
</section>