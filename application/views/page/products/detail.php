<h1><?= $products->title ?></h1>
<img src="<?= $products->image ? base_url("/images/product/$products->image") : base_url("/images/product/default.png") ?>" alt="<?= $products->title ?>">