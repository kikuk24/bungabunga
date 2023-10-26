<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="" <?= $products->image ? base_url("/images/product/$products->image") : base_url("/images/product/default.png") ?>" alt="<?= $products->title ?>">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="<?= $products->image ? base_url("/images/product/$products->image") : base_url("/images/product/default.png") ?>" alt="<?= $products->title ?>" />
          </a>
        </div>

      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            <?= ucwords($products->title) ?>
            <?php foreach ($product_detail as $row) : ?>
              <p class="text-muted fs-6"><?= $row->category_title ?></p>
            <?php endforeach ?>
          </h4>

          <div class="mb-3">
            <span class="h5">Rp<?= number_format($products->price, 0, ',', '.') ?>,-</span>
            <span class="text-muted">/per item</span>
          </div>

          <p>
            <?= $products->description ?>
          </p>
          <hr />
          <a href="http://wa.me/+6289612383979" class="btn btn-foo shadow-0" target="_blank" rel="noopener noreferrer">Beli Sekarang</a>
        </div>
      </main>
    </div>
  </div>
</section>
<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link w-100" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Profile Kami</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                Visi kami adalah membawa keindahan, makna, dan inovasi ke dalam setiap mahar nikah yang kami hasilkan.
                Kami percaya
                bahwa mahar bukan hanya sekadar hiasan, tetapi juga simbol cinta sejati dan kesatuan dalam pernikahan.
                Itulah mengapa
                kami berkomitmen untuk merancang mahar yang unik, penuh makna, dan sesuai dengan keinginan Anda.
              </p>
              Kami memahami bahwa setiap pasangan memiliki cerita cinta yang berbeda, dan itulah yang membuat
              pernikahan begitu
              istimewa. Melalui mahar kami, kami ingin membantu Anda mengekspresikan cinta Anda dalam bentuk yang
              indah dan kreatif.
              <p>
                Dalam perjalanan kami, kami telah meraih kepercayaan banyak pasangan yang telah memilih kami sebagai
                mitra dalam
                pernikahan mereka. Kami berterima kasih atas kepercayaan ini dan berkomitmen untuk terus memberikan
                mahar nikah yang
                luar biasa.
              </p>
              Kami mengundang Anda untuk menjelajahi koleksi mahar kami dan merasakan keindahan serta makna di
              setiap rancangan kami.
              Terima kasih telah memilih Bungabunga sebagai bagian dari perjalanan cinta Anda, dan kami
              berharap dapat
              membantu Anda menciptakan kenangan pernikahan yang tak terlupakan.
              </p>
            </div>


          </div>
          <!-- Pills content -->
        </div>
      </div>
      <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produk Terbaru</h5>
              <?php foreach ($product_terbaru as $row) : ?>
                <div class="d-flex mb-3">
                  <a href="#" class="me-3">
                    <img src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                  </a>
                  <div class="info">
                    <a href="#" class="nav-link mb-1">
                      <?= ucwords($row->product_title) ?>
                    </a>
                    <strong class="text-dark">Rp<?= number_format($row->price, 0, ',', '.') ?></strong>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>