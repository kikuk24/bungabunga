<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php foreach (getHome() as $home) : ?>
    <title><?= isset($title) ? ucwords($title) : ucwords($home->title) ?></title>
    <meta name="description" content="<?= isset($description) ? $description : $home->description ?>">
  <?php endforeach ?>
  <link rel="stylesheet" href="<?= base_url('/assets/libs/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/libs/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/app.css') ?>">



</head>

<body>

  <?php $this->load->view('layouts/_navbar'); ?>

  <?php $this->load->view($page); ?>
  <?php $this->load->view('layouts/_footer'); ?>


  <!-- <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script> -->
  <script src="<?= base_url('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('/assets/js/script.js') ?>"></script>
</body>

</html>