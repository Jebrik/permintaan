<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengaturan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('gagal'); ?>"></div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <?php if ($this->session->userdata('foto') == NULL) : ?>
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>src/backend/dist/img/profile.png" style="width:100px;height:105px;">
                <?php else : ?>
                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>src/img/profile/<?= $this->session->userdata('foto') ?>" style="width:100px;height:105px;">
                <?php endif ?>

              </div>

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama_user'); ?></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('jabatan'); ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item text-center">
                  <b>SIM Aset Jagodigital</b>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Ubah Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ubah Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <?php if ($this->session->flashdata('gagal_store')) { ?>
                <div class="alert alert-danger col-md-8">
                  <?= $this->session->flashdata('gagal_store'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php } ?>
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger col-md-8 alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?= validation_errors(); ?>
                </div>
              <?php endif ?>
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <form class="form-horizontal" action="<?= base_url('users/ubah') ?>" autocomplete="off" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-6">
                          <input type="text" value="<?php echo $this->session->userdata('nama_user'); ?>" class="form-control" name="nama_user" placeholder="Masukan Nama User.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-6">
                          <input type="text" value="<?php echo $this->session->userdata('username'); ?>" class="form-control" name="username" placeholder="Masukan Username.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" value="<?php echo $this->session->userdata('jabatan'); ?>" name="jabatan" placeholder="Masukan Jabatan.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Foto Profil</label>
                        <div class="col-sm-6">
                          <input type="file" class="form-control" name="foto">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Ubah Profile</button>
                    </div>
                    <!-- /.card-footer -->
                  </form>
                  <br />
                  <ul>
                    <li>Ukuran foto disarankan 300 x 300 pixel</li>
                  </ul>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <form class="form-horizontal" action="<?= base_url('users/ubah_password') ?>" autocomplete="off" method="post">
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru.." required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" name="password_dua" placeholder="Ulangi Password Baru.." required>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-info">Ubah Password</button>
                    </div>
                    <br />
                    <ul>
                      <li>Password minimal 5 karakter</li>
                    </ul>
                    <!-- /.card-footer -->
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>