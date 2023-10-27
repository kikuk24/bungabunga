<main role="main" class="container">
  <?php $this->load->view('layouts/_alert'); ?>
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card mb-3">
        <div class="card-header">
          <span>Content</span>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              foreach ($content as $row) :  $no++; ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $row->home_title ?></td>
                  <td><?= $row->home_description ?></td>
                  <td>
                    <?= form_open("home/delete/$row->id", ['method' => 'POST']) ?>
                    <?= form_hidden('id', $row->id) ?>
                    <a href="<?= base_url("editcontent/edit/$row->id") ?>" class="btn btn-sm">
                      <i class="fas fa-edit text-info"></i>
                    </a>
                    <?= form_close() ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

          
          </nav>
        </div>
      </div>
    </div>
  </div>
</main>