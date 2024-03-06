<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <?php if ($this->session->flashdata('gagal_store')) { ?>
          <div class="alert alert-danger col-md-12"> 
            <?= $this->session->flashdata('gagal_store') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 
          </div>
        <?php } ?>

        <?=form_error('username','<div class="alert alert-danger" role="alert">','</div>')?>
        <?=form_error('password','<div class="alert alert-danger" role="alert">','</div>')?>

        <h3 class="card-title">
          <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-block bg-gradient-primary">Tambah User</button>
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($user as $row): ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['nama_user'];?></td>
                    <td><?=$row['username'];?></td>
                    <td><?=$row['jabatan'];?></td>
                    <td>
                      <a href="<?=base_url('users/hapus/'.$row['id_user'])?>" class="btn btn-danger btn-sm tombol-hapus">
                          <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Jabatan</th>
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
  <!-- Modal Tambah -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('users/tambah')?>" autocomplete="off" method="post">
            <div class="form-group row">
              <label for="nama_user" class="col-sm-6 col-form-label">Nama User</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Nama User.." name="nama_user" required autofocus>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-6 col-form-label">Username</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Username.." name="username" required>
              </div>
            </div>
            <div class="form-group row">              
              <div class="col-sm-6">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password.." name="password" required>
              </div>
              <div class="col-sm-6">
                <label for="password_confirm" class="col-sm-8 col-form-label">Ulangi Password</label>
                <input type="password" class="form-control" placeholder="Ulangi Password.." name="password_confirm" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="jabatan" class="col-sm-6 col-form-label">Jabatan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Jabatan.." name="jabatan" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="role" class="col-sm-6 col-form-label">Role</label>
              <div class="col-sm-12">
                <select name="role" class="form-control" required>
                  <option value="">- Pilih --</option>
                  <option value="1">Administrator</option>
                  <option value="2">Manager</option>
                  <option value="3">Staf</option>       
                </select>
              </div>
            </div>
            <!-- /.card-body -->                
          </div>
          <div class="modal-footer content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal tambah -->
</div>
<script src="<?=base_url()?>src/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>src/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "language": {
        "sSearch": "Cari"
      }
    });
  });
</script>