<main class="container my-5">
  <div class="row">
    <div class="card col-md-12 mx-3">
      <div class="card-header">
        <img class="img-fluid" src="<?= $artikel->cover ? base_url("/images/artikel/$artikel->cover") : base_url("/images/product/default.png") ?>" alt="">
      </div>
      <div class="card-body">
        <h1 class="fs-4"><?= $artikel->title ?></h1>
        <div class="fs-6"><?= $artikel->content ?></div>
      </div>
    </div>
  </div>
  </div>
</main>