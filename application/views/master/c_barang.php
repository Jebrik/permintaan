<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('barang')?>">Barang</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Data</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="<?=base_url('barang/simpan')?>" autocomplete="off" method="post">
            <div class="card-body">
            <div class="form-group row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Kd Barang</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="kd_barang" placeholder="Masukan Nama Barang.." value="<?= $kd_barang ?>" readonly required>
                </div>
              </div>
              <div class="form-group row">
                <label for="id_kategori" class="col-sm-2 col-form-label">Kategori Barang</label>
                <div class="col-sm-6">
                    <select name="id_kategori" class="form-control" required>
                      <option value="">- Pilih --</option>
                      <?php foreach ($jb as $row): ?>
                        <option value="<?=$row['id_kategori'];?>"><?=$row['kode_kategori'];?> - <?=$row['nama_kategori'];?></option>
                      <?php endforeach ?>      
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="merek" class="col-sm-2 col-form-label">Merek</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="merek" placeholder="Masukan Merek.." required>
                </div>
              </div>           
              <div class="form-group row">
                <label for="tahun_perolehan" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="harga" placeholder="Ketik harga" required>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?=base_url('barang')?>">
                <button type="button" class="btn btn-danger">Kembali</button>
              </a>
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.card-footer -->
          </form>
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
  <!-- /.content-wrapper -->