<nav>
  <div class="nav-bar">
    <i class="fa-solid fa-bars-staggered sidebar-open"></i>
    <span class="logo"><a href="<? base_url() ?>">Bungabunga.</a></span>

    <div class="menu">
      <div class="logo-toggle">
        <span class="logo"><a href="<?= base_url() ?>">Bungabunga.</a></span>
        <i class='bx bx-x sidebar-close'></i>
      </div>

      <ul class="nav-links">
        <li><a href="<?= base_url() ?>">Beranda</a></li>
        <li><a href="">Tentang</a></li>
        <li><a href="<?= base_url('products') ?>">Produk</a></li>
        <li><a href="">Kontak</a></li>
        <li><a href="">Kontak</a></li>
        <?php if ($this->session->userdata('role') == 'admin') : ?>
          <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Action
            </button>
            <ul class="dropdown-menu tex">
              <li><a class="dropdown-item text-dark" href="<?= base_url('product') ?>">Product</a></li>
              <li><a class="dropdown-item text-dark" href="<?= base_url('category') ?>">Kategori</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-dark" href="<?= base_url('logout') ?>">Logout</a></li>
            </ul>
          </div>
        <?php endif ?>
      </ul>
    </div>

    <div class="darkLight-searchBox">
      <div class="dark-light">
        <i class="fa-regular fa-sun sun"></i>
        <i class="fa-solid fa-moon moon"></i>
      </div>

      <div id="search" class="searchBox">
        <div class="search-toogle">
          <i class="fa-solid fa-xmark cancel"></i>
          <i class="fa-solid fa-magnifying-glass search"></i>
        </div>
        <div class="search-field">
          <form action="<?= base_url("products/search") ?>" method="post" class="form-control">
            <input type="text" name="keyword" placeholder=" search" value="<?= $this->session->userdata('keyword') ?>">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-magnifying-glass search"></i>

            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>