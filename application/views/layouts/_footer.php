<footer class="site-footer z-3">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>About</h6>
        <p class="text-justify">Bungabunga. adalah penyedia jasa mahar nikah yang berdedikasi untuk memberikan solusi
          yang indah dan bermakna untuk pernikahan Anda. Di
          sini, kami merangkai karya seni mahar nikah dengan cinta dan perhatian pada detail, yang akan menjadi bagian
          yang tak
          terpisahkan dari hari istimewa Anda.</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Categories</h6>
        <ul class="footer-links">
          <?php foreach (getCategories() as $category) : ?>

            <li><a href="<?= base_url("products/category/$category->slug") ?>"><?= ucwords($category->title) ?></a></li>
          <?php endforeach ?>

        </ul>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          <li><a href="">Beranda</a></li>
          <li><a href="">Produk</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Kontak</a></li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by
          <a href="#">Bungabunga</a>.
        </p>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <ul class="social-icons">
          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>