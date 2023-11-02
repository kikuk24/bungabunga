<?php foreach ($artikel as $row) : ?>
  <div class="blog-card col-md-5">
    <div class="meta">
      <div class="photo" style="background-image: url(<?= $row->cover ? base_url("/images/artikel/$row->cover") : base_url("/images/artikel/default.png") ?>)"></div>
      <ul class="details">
        <li class="author"><a href="#">Bungabunga</a></li>
        <li class="date"><?= $row->dibuat ?></li>
        <li class="tags">
          <!-- <ul>
              <li><a href="#">Learn</a></li>
              <li><a href="#">Code</a></li>
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
            </ul> -->
        </li>
      </ul>
    </div>

    <div class="description">
      <h1><?= $row->judul ?></h1>
      <h2><?= $row->category_title ?></h2>
      <p><?= $row->content ?></p>
      <p class="read-more">
        <a href="<?= base_url("artikel/detail/$row->artikel_slug") ?>">Read More</a>
      </p>
    </div>
  </div>
<?php endforeach ?>