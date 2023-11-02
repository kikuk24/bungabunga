<main class="">
  <?php foreach ($categories as $category) : ?>
    <h2 class="text-center"><?php echo $category['title']; ?></h2>
    <div class="contain">
      <?php if (isset($articles[$category['id']])) : ?>
        <?php foreach ($articles[$category['id']] as $article) : ?>
          <div class="post">
            <div class="header_post">
              <img src="<?= $article['cover'] ? base_url("/images/artikel/" . $article['cover']) : base_url("/images/artikel/default.png") ?>" width="350px" height="200px" alt="<?= $article['judul'] ?>">
            </div>

            <div class="body_post">
              <div class="post_content">

                <a href="<?= base_url('artikel/detail/' . $article['artikel_slug']) ?>">
                  <h1><?= $article['judul']; ?></h1>
                </a>
                <p class="post_description"><?= $article['content'] ?></p>

                <div class="container_infos">
                  <div class="postedBy">
                    <span>author</span>
                    Bungabunga
                  </div>

                  <div class="container_tags">
                    <span>Date</span>
                    <div class="tags">
                      <?= $article['dibuat'] ?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif; ?>
    </div>
    </div>
  <?php endforeach ?>
</main>