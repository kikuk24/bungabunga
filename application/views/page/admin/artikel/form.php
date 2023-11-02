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
    <div id="content-wrapper" class="d-flex flex-column">
      <?php $this->load->view('page/admin/component/_topbar'); ?>"
      <?php $this->load->view('layouts/_alert');
      ?>
      <div class="container-fluid">
        <main role="main" class="container">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="card mb-3">
                <div class="card-header">
                  <span>Tambah Artikel</span>
                </div>
                <div class="card-body">
                  <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                  <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                  <div class="form-group">
                    <label for="">Judul</label>
                    <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                    <?= form_error('title') ?>
                  </div>
                  <div class="form-group">
                    <label for="">Content</label>
                    <?= form_textarea(['name' => 'content', 'value' => $input->content, 'row' => 9, 'class' => 'form-control']) ?>
                    <?= form_error('description') ?>
                  </div>
                  <div class="form-group">
                    <label for="">Kategori</label>
                    <?= form_dropdown('id_category_artikel', getDropdownList('category_artikel', ['id', 'title']), $input->id_category_artikel, ['class' => 'form-control']) ?>
                    <?= form_error('id_category_artikel') ?>
                  </div>
                  <div class="form-group">
                    <label for="">Gambar</label>
                    <br>
                    <?= form_upload('image') ?>
                    <?php if ($this->session->flashdata('image_error')) : ?>
                      <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                    <?php endif ?>
                    <?php if ($input->cover) : ?>
                      <img src="<?= base_url("/images/artikel/$input->cover") ?>" alt="" height="150">
                    <?php endif ?>
                  </div>
                  <div class="form-group">
                    <label for="">Slug</label>
                    <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                    <?= form_error('slug') ?>
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <?= form_close() ?>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>



  <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="<?= base_url('assets/libs/jquery-easing/jquery.easing.min.js') ?>"></script>

  <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>