  <div class="products">
    <div class="product-wrapper ">
      <h1>Produk Terbaru</h1>
      <div class="category">
        <ul class="">
          <li><a class="link-category" href="<?= base_url('products') ?>">Semua Kategori</a></li>
          <?php foreach (getCategories() as $category) : ?>
            <li><a class="link-category" href="<?= base_url("products/category/$category->slug") ?>"><?= $category->title ?></a></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
    <div class="d_flex flex-centerY-centerX container">
      <?php foreach ($content as $row) : ?>
        <div class="page-wrapper" onclick="location.href='<?= base_url("/products/detail/$row->slug") ?>'">
          <div class="page-inner">
            <div class="row">
              <div class="el-wrapper">
                <div class="box-up">
                  <img class="img" src="<?= $row->image ? base_url("/images/product/$row->image") : base_url("/images/product/default.png") ?>" alt="">
                  <div class="img-info">
                    <div class="info-inner">
                      <span class="p-name"><?= ucwords($row->product_title) ?></span>
                      <span class="p-company"><a href="<?= base_url("/products/category/$row->category_slug") ?>"><?= $row->category_title ?></a></span>
                    </div>
                    <div class="a-size">Ketersedian : <span class="size">Tersedia</span></div>
                  </div>
                </div>

                <div class="box-down">
                  <div class="h-bg">
                    <div class="h-bg-inner"></div>
                  </div>

                  <a class="cart" href="wa.me/+6289612383979">
                    <span class="price">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</span>
                    <span class="add-to-cart">
                      <span class="txt">Beli Sekarang</span>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>