<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <link rel="stylesheet" href="<?= base_url('/assets/css/sb-admin-2.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/assets/libs/fontawesome/css/all.min.css') ?>">

</head>

<body id="page-top">
  <div id="wrapper">
    <?php $this->load->view('page/admin/component/_sidebar'); ?>
    <?php $this->load->view('layouts/_alert2'); ?>

    <div id="content-wrapper" class="d-flex flex-column">
      <?php $this->load->view('page/admin/component/_topbar'); ?>"
      <div class="container-fluid">
        <?php $this->load->view('page/admin/component/dashboard'); ?>
      </div>
    </div>
  </div>



  <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="<?= base_url('assets/libs/jquery-easing/jquery.easing.min.js') ?>"></script>

  <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>