<!-- summernote -->
<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/summernote/summernote-bs4.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Monitoring</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('monitoring')?>">Monitoring</a></li>
            <li class="breadcrumb-item active">Ubah Monitoring</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="flash-data-gagal" data-flashdatagagal="<?=$this->session->flashdata('gagal');?>"></div>

  <!-- Main content -->
  <section class="content">
     <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Ubah Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" action="<?=base_url('monitoring/ubah')?>" autocomplete="off" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_monitoring" value="<?=$mt['id_monitoring']?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="id_aset" class="col-sm-4 col-form-label">Kode Aset</label>
                    <div class="col-sm-6">
                      <select name="id_aset" class="id_aset form-control" required>
                        <option value="">- Pilih --</option>
                        <?php foreach ($aset as $x): ?>
                          <option <?php if($x['id_aset'] == $mt['id_aset']){ echo 'selected="selected"'; } ?> value="<?=$x['id_aset'];?>"><?=$x['kode_aset'];?> | <?=$x['nama_barang'];?></option>
                        <?php endforeach ?>      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kerusakan" class="col-sm-4 col-form-label">Kerusakan</label>
                    <div class="col-sm-6">
                      <textarea name="kerusakan" class="textarea form-control" required><?=$mt['kerusakan']?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kerusakan" class="col-sm-4 col-form-label">Akibat yang terjadi</label>
                    <div class="col-sm-6">
                      <textarea name="akibat" class="textarea form-control" required><?=$mt['akibat']?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="faktor" class="col-sm-4 col-form-label">Faktor yang mempengaruhi</label>
                    <div class="col-sm-6">
                      <textarea name="faktor" class="textarea form-control" required><?=$mt['faktor']?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="monitoring" class="col-sm-4 col-form-label">Monitoring</label>
                    <div class="col-sm-6">
                      <textarea name="monitoring" class="textarea form-control" required><?=$mt['monitoring']?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pemeliharaan" class="col-sm-4 col-form-label">Pemeliharaan yang harus dilakukan</label>
                    <div class="col-sm-6">
                      <textarea name="pemeliharaan" class="textarea form-control" required><?=$mt['pemeliharaan']?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kerusakan" class="col-sm-4 col-form-label">Jumlah Kerusakan</label>
                    <div class="col-sm-6">
                      <input type="number" value="<?=$mt['jml_rusak']?>" name="jml_rusak" class="form-control" placeholder="Masukan Jumlah.." required>
                    </div>
                  </div>  
                  <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto Fisik Aset</label>
                    <div class="col-sm-6">
                     <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                      </div>
                    </div>
                    </div>        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="<?=base_url('monitoring')?>">
                    <button type="button" class="btn btn-danger">Kembali</button>
                  </a>
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- Summernote -->
<script src="<?=base_url()?>src/backend/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url()?>src/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

  $(document).ready(function() {
    $('.id_aset').select2({
      theme: "classic"
    });
  });

  $(document).ready(function () {
    bsCustomFileInput.init();
  });

  $(function () {
    // Summernote
    $('.textarea').summernote({
    height: 150,  
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']]
      ]
    });
  });
</script>


