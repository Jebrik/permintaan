<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Kriteria</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Keputusan Pengadaan</a></li>
            <li class="breadcrumb-item active">Data Kriteria</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data" data-flashdata="<?=$this->session->flashdata('sukses');?>"></div>
  <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>

  <!-- Main content -->
  <section class="content">
     <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kriteria Nilai Spesifikasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table class="table table-bordered">
                   <thead>
                     <th>No.</th>
                     <th>Keterangan</th>
                     <th>Nilai</th>
                     <th>Aksi</th>
                   </thead>
                   <tbody>
                    <?php $no=1; foreach ($spek as $row): ?>
                      <tr>
                      <td><?=$no++;?></td>
                       <td><?=$row['keterangan']?></td>
                       <td><?=$row['nilai']?></td>
                       <td>
                          <a href="#" data-toggle="modal" data-target="#modal-ubah<?=$row['id_spesifikasi'];?>" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Ubah
                          </a>
                       </td>
                      </tr>
                    <?php endforeach ?>
                   </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kriteria Nilai Kualitas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                   <thead>
                     <th>No.</th>
                     <th>Keterangan</th>
                     <th>Nilai</th>
                     <th>Aksi</th>
                   </thead>
                   <tbody>
                    <?php $no=1; foreach ($klts as $row): ?>
                      <tr>
                      <td><?=$no++;?></td>
                       <td><?=$row['keterangan']?></td>
                       <td><?=$row['nilai']?></td>
                       <td>
                           <a href="#" data-toggle="modal" data-target="#modal-ubahkl<?=$row['id_kualitas'];?>" class="btn btn-info btn-sm">
                            <i class="fas fa-edit"></i> Ubah
                          </a>
                       </td>
                      </tr>
                    <?php endforeach ?>
                   </tbody>
                 </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal Ubah Spesfikasi-->
   <?php 
    foreach ($spek as $row): 
      $spek_id = $row['id_spesifikasi'];
      $spek_ket = $row['keterangan'];
      $spek_nilai = $row['nilai'];
    ?>
  <div class="modal fade" id="modal-ubah<?=$spek_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Spesifikasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('spesifikasi/ubah')?>" autocomplete="off" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_spesifikasi" value="<?=$spek_id;?>">
            <div class="form-group">
              <label for="keterangan" class="col-sm-6 col-form-label">Keterangan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" value="<?=$spek_ket;?>" placeholder="Masukan Keterangan.." name="keterangan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="nilai" class="col-sm-6 col-form-label">Nilai</label>
              <div class="col-sm-12">
                <input type="number" step="0.01" class="form-control" value="<?=$spek_nilai;?>" placeholder="Masukan Nilai.." name="nilai" required>
              </div>
            </div>
            <!-- /.card-body -->                
          </div>
          <div class="modal-footer content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php endforeach ?>
  <!-- /.modal Ubah Spesfikasi-->

  <!-- Modal Ubah Kualitas-->
   <?php 
    foreach ($klts as $row): 
      $klts_id = $row['id_kualitas'];
      $klts_ket = $row['keterangan'];
      $klts_nilai = $row['nilai'];
    ?>
  <div class="modal fade" id="modal-ubahkl<?=$klts_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Kualitas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('kualitas/ubah')?>" autocomplete="off" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_kualitas" value="<?=$klts_id;?>">
            <div class="form-group">
              <label for="keterangan" class="col-sm-6 col-form-label">Keterangan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" value="<?=$klts_ket;?>" placeholder="Masukan Keterangan.." name="keterangan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="nilai" class="col-sm-6 col-form-label">Nilai</label>
              <div class="col-sm-12">
                <input type="number" step="0.01" class="form-control" value="<?=$klts_nilai;?>" placeholder="Masukan Nilai.." name="nilai" required>
              </div>
            </div>
            <!-- /.card-body -->                
          </div>
          <div class="modal-footer content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php endforeach ?>
  <!-- /.modal Ubah Kualitas-->
