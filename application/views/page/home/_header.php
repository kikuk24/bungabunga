<div class="header">
  <div class="text-judul">
    <?php foreach (getHome() as $home) : ?>
      <h1><?= $home->title ?></h1>
      <p><?= $home->description ?></p>
    <?php endforeach ?>
  </div>
</div>