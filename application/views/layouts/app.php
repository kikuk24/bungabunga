<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'Bunga-bunga' ?>- Bunga-bunga</title>
  <link rel="stylesheet" href="./assets/libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/libs/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/app.css">


</head>

<body>

  <?php $this->load->view('layouts/_navbar'); ?>

  <?php $this->load->view($page); ?>
  <?php $this->load->view('layouts/_footer'); ?>
  <!-- <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script> -->
  <script src="./assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./'assets/js/script.js"></script>
</body>

</html>