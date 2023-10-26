<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'Bunga-bunga' ?>- Bunga-bunga</title>
  <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
  <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/libs/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/app.css">


</head>

<body>

  <?php $this->load->view('layouts/_navbar'); ?>

  <?php $this->load->view($page); ?>
  <?php $this->load->view('layouts/_footer'); ?>


  <!-- <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script> -->
  <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>