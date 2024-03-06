<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Aset</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Keputusan Pengadaan</a></li>
            <li class="breadcrumb-item active">Data Aset</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Data Aset</h3>

                <div class="card-tools">
                  <a href="#" data-toggle="modal" data-target="#modal-default" class="btn-sm btn btn-block btn-outline-primary">
                    Tambah Data
                  </a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                 <div class="table-responsive">
                  <table class="table table-bordered">
                   <thead>
                     <th>No.</th>
                     <th>Nama Aset</th>
                     <th>Harga</th>
                     <th>Aksi</th>
                   </thead>
                   <tbody>
                    <?php if (count($aset)>0): ?>
                      <?php $no=1; foreach ($aset as $row): ?>
                        <tr>
                          <td><?=$no++;?></td>
                          <td><?=$row['nama_aset']?></td>
                          <td><?=rupiah($row['harga'])?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#modal-ubah<?=$row['id_aset'];?>" class="btn btn-info btn-sm">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=base_url('data_aset/hapus/'.$row['id_aset'])?>" class="btn btn-danger btn-sm tombol-hapus">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="4" align="center">Data tidak tersedia.. silahkan tambah data</td>
                      </tr>
                    <?php endif ?>                    
                   </tbody>
                 </table>
                 </div> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Data Aset + Penilaian</h3>

                <div class="card-tools">
                  <a href="#" data-toggle="modal" data-target="#modal-penilaian" class="btn-sm btn btn-block btn-outline-primary">
                    Tambah Data
                  </a>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                   <tr>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>No</b>.</td>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>Alternatif</b></td>
                     <td colspan="3" align="center"><b>Kriteria</b></td>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>Aksi</b></td>
                   </tr>
                   <tr>
                     <td align="center"><b>Spesifikasi</b></td>
                     <td align="center"><b>Kualitas</b></td>
                     <td align="center"><b>Harga</b></td>
                   </tr>
                   <?php if (count($nilai)>0): ?>
                      <?php $no=1; foreach ($nilai as $row): ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['nama_aset'];?></td>
                        <td><?=$row['ket_spek'];?></td>
                        <td><?=$row['ket_nilai'];?></td>
                        <td><?=rupiah($row['harga']);?></td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#modal-ubahnl<?=$row['id_nilai'];?>" class="btn btn-info btn-sm">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=base_url('penilaian/hapus/'.$row['id_nilai'])?>" class="btn btn-danger btn-sm tombol-hapus">
                              <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" align="center">Data tidak tersedia.. silahkan tambah data</td>
                      </tr>
                    <?php endif ?>
                 </table>
                </div>
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
 <!-- Modal Tambah Aset-->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Aset</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('data_aset/simpan')?>" autocomplete="off" method="post">
            <div class="form-group">
              <label for="nama_aset" class="col-sm-6 col-form-label">Nama Aset</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Masukan Nama.." name="nama_aset" required>
              </div>
            </div>  
            <div class="form-group">
              <label for="harga" class="col-sm-6 col-form-label">Harga Aset</label>
              <div class="col-sm-12">
                <input type="number" class="form-control" placeholder="Masukan Harga.." name="harga" required>
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
  <!-- /.modal tambah Aset-->

   <!-- Modal Ubah Aset-->
    <?php 
    $no=1;
    foreach ($aset as $row): 
      $aset_id = $row['id_aset'];
      $aset_nama = $row['nama_aset'];
      $aset_harga = $row['harga'];

    ?>
  <div class="modal fade" id="modal-ubah<?=$aset_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Aset</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('data_aset/ubah')?>" autocomplete="off" method="post">
            <input type="hidden" name="id_aset" value="<?=$aset_id;?>">
            <div class="form-group">
              <label for="nama_aset" class="col-sm-6 col-form-label">Nama Aset</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" value="<?=$aset_nama?>" placeholder="Masukan Nama.." name="nama_aset" required>
              </div>
            </div>  
            <div class="form-group">
              <label for="harga" class="col-sm-6 col-form-label">Harga Aset</label>
              <div class="col-sm-12">
                <input type="number" class="form-control" value="<?=$aset_harga?>" placeholder="Masukan Harga.." name="harga" required>
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
  <!-- /.modal ubah Aset-->

  <!-- Modal Tambah Aset Penilaian-->
  <div class="modal fade" id="modal-penilaian">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Penilaian</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('penilaian/simpan')?>" autocomplete="off" method="post">
            <div class="form-group">
              <label for="id_aset" class="col-sm-6 col-form-label">Daftar Aset</label>
              <div class="col-sm-12">
                  <select name="id_aset" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($aset as $row): ?>
                    <option value="<?=$row['id_aset']?>"><?=$row['nama_aset']?></option>
                    <?php endforeach ?>     
                  </select>
              </div>
            </div>  
            <div class="form-group">
              <label for="id_spesifikasi" class="col-sm-6 col-form-label">Kriteria Spesifikasi</label>
              <div class="col-sm-12">
                  <select name="id_spesifikasi" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($spek as $row): ?>
                    <option value="<?=$row['id_spesifikasi']?>"><?=$row['keterangan']?></option>
                    <?php endforeach ?>     
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="id_kualitas" class="col-sm-6 col-form-label">Kriteria Kualitas</label>
              <div class="col-sm-12">
                  <select name="id_kualitas" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($klts as $row): ?>
                    <option value="<?=$row['id_kualitas']?>"><?=$row['keterangan']?></option>
                    <?php endforeach ?>     
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
  <!-- /.modal tambah Aset Penilaian-->

   <!-- Modal Ubah Nilai Aset-->
    <?php 
    $no=1;
    foreach ($nilai as $row): 
      $nilai_id = $row['id_nilai'];
      $aset_id = $row['id_as'];
      $spek_id = $row['id_spek'];
      $kualitas_id = $row['id_kual'];
    ?>
  <div class="modal fade" id="modal-ubahnl<?=$nilai_id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data Nilai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?=base_url('penilaian/ubah')?>" autocomplete="off" method="post">
            <input type="hidden" name="id_nilai" value="<?=$nilai_id;?>">
             <div class="form-group">
              <label for="id_aset" class="col-sm-6 col-form-label">Daftar Aset</label>
              <div class="col-sm-12">
                  <select name="id_aset" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($aset as $x): ?>
                    <option <?php if($x['id_aset'] == $aset_id){ echo 'selected="selected"'; } ?> value="<?=$x['id_aset']?>"><?=$x['nama_aset']?></option>
                    <?php endforeach ?>     
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="id_spesifikasi" class="col-sm-6 col-form-label">Kriteria Spesifikasi</label>
              <div class="col-sm-12">
                  <select name="id_spesifikasi" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($spek as $y): ?>
                    <option <?php if($y['id_spesifikasi'] == $spek_id){ echo 'selected="selected"'; } ?> value="<?=$y['id_spesifikasi']?>"><?=$y['keterangan']?></option>
                    <?php endforeach ?>     
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="id_kualitas" class="col-sm-6 col-form-label">Kriteria Kualitas</label>
              <div class="col-sm-12">
                  <select name="id_kualitas" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach ($klts as $z): ?>
                    <option <?php if($z['id_kualitas'] == $kualitas_id){ echo 'selected="selected"'; } ?> value="<?=$z['id_kualitas']?>"><?=$z['keterangan']?></option>
                    <?php endforeach ?>     
                  </select>
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
  <!-- /.modal ubah Aset-->

 




