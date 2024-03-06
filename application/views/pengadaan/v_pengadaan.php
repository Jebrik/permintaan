<link rel="stylesheet" href="<?= base_url() ?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengadaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pengadaan</a></li>
            <li class="breadcrumb-item active">Lihat Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Data Pengadaan Aset
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2') : ?>
          <form action="<?= base_url('pengadaan/filter') ?>" method="POST" autocomplete="off">
            <div class="row">
              <div class="col-4">
                <select name="id_lokasi" class="form-control" required>
                  <option value="">- Pilih Lokasi --</option>
                  <?php foreach ($lokasi as $row) : ?>
                    <option value="<?= $row['id_lokasi']; ?>"><?= $row['nama_lokasi']; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col-4">
                <input type="text" name="tahun_pengadaan" class="form-control" placeholder="Tahun Pengadaan" required>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-block btn-outline-primary">Filter</button>
              </div>
              <div class="col">
                <button type="reset" class="btn btn-block btn-outline-danger">Reset</button>
              </div>
            </div>
          </form>
          <br />
        <?php endif ?>
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Penempatan</th>
                <th>Nama Aset</th>
                <th>Tahun</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2') : ?>
                <?php $no = 1;
                foreach ($item as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_user']; ?></td>
                    <td><?= $row['nama_lokasi']; ?></td>
                    <td><?= $row['nama_aset']; ?></td>
                    <td><?= $row['tahun_pengadaan']; ?></td>
                    <td>

                      <?php if ($row['status'] == '0') : ?>
                        <a class="btn btn-primary btn-sm" href="<?= base_url('pengadaan/setujui/' . $row['id_pengadaan']) ?>">
                          <i class="fa fa-check"></i> Setujui
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?= base_url('pengadaan/tolak/' . $row['id_pengadaan']) ?>">
                          <i class="fa fa-times"></i> Tolak
                        </a>
                      <?php else : ?>
                        <?php if ($row['status'] == '1') : ?>
                          <span class="badge badge-success">Disetujui</span>
                        <?php else : ?>
                          <span class="badge badge-danger">Ditolak</span>
                        <?php endif ?>

                      <?php endif ?>

                    </td>
                    <td>
                      <a href="<?= base_url('pengadaan/detail/' . $row['id_pengadaan']) ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="<?= base_url('pengadaan/hapus/' . $row['id_pengadaan']) ?>" class="btn btn-danger btn-sm tombol-hapus">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="<?= 'upload/' . $row['nama_dokumen'] ?>" target="_blank" class="btn btn-warning btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>

              <?php else : ?>

                <?php $no = 1;
                foreach ($item_user as $row) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_user']; ?></td>
                    <td><?= $row['nama_lokasi']; ?></td>
                    <td><?= $row['nama_aset']; ?></td>
                    <td><?= $row['tahun_pengadaan']; ?></td>
                    <td>
                      <?php if ($row['status'] == '0') { ?>
                        <span class="badge badge-danger">Belum Disetujui</span>
                      <?php } else if ($row['status'] == '1') { ?>
                        <span class="badge badge-success">Disetujui</span>
                      <?php } else { ?>
                        <span class="badge badge-danger">Ditolak</span>
                      <?php } ?>
                    </td>
                    <td>
                      <a href="<?= base_url('pengadaan/detail/' . $row['id_pengadaan']) ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="<?= base_url('pengadaan/hapus/' . $row['id_pengadaan']) ?>" class="btn btn-danger btn-sm tombol-hapus">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>

              <?php endif ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Penempatan</th>
                <th>Nama Aset</th>
                <th>Tahun</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">

      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<script src="<?= base_url() ?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "language": {
        "sSearch": "Cari"
      }
    });
  });
</script>