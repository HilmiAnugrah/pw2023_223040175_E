<?php require('view/data/card.data.php'); ?>


<main id="home">
        <!-- hero -->
       <?php require("hero.php"); ?>
        <!-- akhir hero -->
        <!-- berita Terkini -->
        <section class="berita-terkini">
          <!-- judul berita terkini -->
          <div class="judul-content">
            <h2>Berita Terkini</h2>
            <p clas s="description-content">Berita hari ini yang sedang ramai dicibir atau dibicarakan.</p>
          </div>
          
          <div class="card-berita">
            <?php foreach ($berita as $item) : ?>
                <a href="<?= $link; ?>" class="card-link"> 
                <div class="card">
                    <div class="img">
                        <img src="<?php echo $item['imgSrc']; ?>" alt="gambar masjid al jabar">
                    </div>
                    <div class="judulDescription">
                        <h3 class="judul-card"><?php echo $item['judul']; ?></h3>
                        <div class="tgl-publish">
                            <i class="bi bi-calendar-check"></i>
                            <p class="publish-tgl"><?php echo $item['tglPublish']; ?></p>
                        </div>
                        <p class="description-content"><?php echo $item['deskripsi']; ?></p>
                    </div>
                </div>
                </a>
            <?php endforeach; ?>

          </div>  
          
          </section>
          <!-- akhir Berita Terkini -->

          
        <!-- menu popup -->
        
      </main>