<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Aset Berwujud</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Data Aset</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('aset_wujud')?>">Berwujud</a></li>
              <li class="breadcrumb-item active">Ubah Data</li>
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
          <h3 class="card-title">Form Ubah Data</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <?php if (validation_errors()): ?>
            <div class="alert alert-danger col-md-8 alert-dismissible">                
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?= validation_errors(); ?>
            </div>
          <?php endif ?>
          <p>*Keterangan Kode Aset :</p>
          <ul>
            <li>0000 = Kode Aset (0001/0002..dst) </li>
            <li>XXX = Kategori Aset (TIK,GEDUNG,dll)</li>
            <li>20XX = Tahun Perolehan Aset </li>
          </ul>
          <?php foreach ($aset as $row): ?>
          <form class="form-horizontal" action="<?=base_url('aset_wujud/ubah')?>" autocomplete="off" method="post">
            <input type="hidden" name="id_aset" value="<?=$row['id_aset']?>">
            <div class="card-body">
              <div class="form-group row">
                <label for="kode_aset" class="col-sm-2 col-form-label">Kode Aset*</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?=$row['kode_aset']?>" name="kode_aset" placeholder="0000/XXX/20XX" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="id_barang" class="col-sm-2 col-form-label">Nama Aset</label>
                <div class="col-sm-6">
                  <select name="id_barang" class="id_barang form-control" required>
                    <option value="">- Pilih --</option>
                    <?php foreach ($brg as $x): ?>
                      <option <?php if($x['id_barang'] == $row['id_barang']){ echo 'selected="selected"'; } ?> value="<?=$x['id_barang'];?>"><?=$x['nama_barang'];?></option>
                    <?php endforeach ?>      
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                <div class="col-sm-6">
                  <input type="number" value="<?=$row['volume']?>" class="form-control" name="volume" min="0" placeholder="Masukan Volume.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" value="<?=$row['satuan']?>" name="satuan" placeholder="Buah/Unit/Lembar.." required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                <div class="col-sm-6">
                   <select name="kondisi" class="form-control" required>
                    <option value="">- Pilih --</option>
                    <option <?php if($row['kondisi'] == "Baik"){ echo 'selected="selected"'; } ?> value="Baik">Baik</option>
                    <option <?php if($row['kondisi'] == "Renovasi"){ echo 'selected="selected"'; } ?> value="Renovasi">Renovasi</option>
                    <option <?php if($row['kondisi'] == "Rusak"){ echo 'selected="selected"'; } ?> value="Rusak">Rusak</option>     
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="id_lokasi" class="col-sm-2 col-form-label">Lokasi Aset</label>
                <div class="col-sm-6">
                  <select name="id_lokasi" class="form-control" required>
                    <option value="">- Pilih --</option>
                    <?php foreach ($lokasi as $y): ?>
                      <option <?php if($y['id_lokasi'] == $row['id_lokasi']){ echo 'selected="selected"'; } ?> value="<?=$y['id_lokasi'];?>"><?=$y['nama_lokasi'];?></option>
                    <?php endforeach ?>      
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="umur_ekonomis" class="col-sm-2 col-form-label">Umur Ekonomis</label>
                <div class="col-sm-6">
                  <div class="input-group mb-3">
                    <input type="number" name="umur_ekonomis" value="<?=$row['umur_ekonomis']?>" placeholder="1/2/3/.." class="form-control">
                    <div class="input-group-append">
                      <span class="input-group-text">Tahun</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Nilai Aset</label>
                <div class="col-sm-6">
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="number" value="<?=$row['harga']?>" name="harga" class="form-control" placeholder="0000" required>
                </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_bantuan" class="col-sm-2 col-form-label">Cara Perolehan</label>
                <div class="col-sm-6">
                  <select name="jenis_bantuan" class="form-control" required>
                    <option value="">- Pilih --</option>
                    <option <?php if($row['jenis_bantuan'] == 'Pembelian'){ echo 'selected="selected"'; } ?> value="Pembelian">Pembelian</option>
                    <option <?php if($row['jenis_bantuan'] == 'Hibah'){ echo 'selected="selected"'; } ?> value="Hibah">Hibah</option>     
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_terima" class="col-sm-2 col-form-label">Generate QR Code?</label>
                <div class="col-sm-6">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="generate" id="generate" <?php if($row['qr_code'] != NULL){ echo 'checked="checked"'; } ?>>
                    <label class="form-check-label" for="generate">
                      Ya
                    </label>
                  </div>
                </div>
              </div>           
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?=base_url('aset_wujud')?>">
                <button type="button" class="btn btn-danger">Kembali</button>
              </a>
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <!-- /.card-footer -->
          </form>
          <?php endforeach ?>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>

    $(document).ready(function() {
      $('.id_barang').select2({
        theme: "classic",
        placeholder : '-- Pilih --'
      });
    });
  </script>

