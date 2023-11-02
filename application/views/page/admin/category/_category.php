<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
  For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
      <a href="<?= base_url('category/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-plus text-white-50"></i> Tambah Product</a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;
          foreach ($content as $row) : $no++; ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $row->title ?></td>
              <td><?= $row->slug ?></td>
              <td>
                <?= form_open("category/delete/$row->id", ['method' => 'POST']) ?>
                <?= form_hidden('id', $row->id) ?>
                <a href="<?= base_url("category/edit/$row->id") ?>" class="btn btn-sm">
                  <i class="fas fa-edit text-info"></i>
                </a>
                <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                  <i class="fas fa-trash text-danger"></i>
                </button>
                <?= form_close() ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer">
    <nav aria-label="Page navigation example">
      <?= $pagination ?>
    </nav>
  </div>
</div>