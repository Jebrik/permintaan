<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Penghapusan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item active">Penghapusan</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Penghapusan Aset</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             <!--    <div class="alert alert-light" role="alert">
                  <p>
                    Aset dapat dihapuskan dengan ketentuan sebagai berikut :
                    <ul>
                      <li>Aset sudah tidak digunakan</li>
                      <li>Fungsi aset sudah tidak sesuai kebutuhan</li>
                      <li>Nilai Aset sudah mendekati 0</li>
                      <li>Pemakaian aset melebihi usia ekonomis</li>
                      <li>Nilai penyusutan dapat dilihat di halaman <a href="<?=base_url('penyusutan')?>" class="alert-link">Penyusutan</a></li>
                    </ul>
                  </p>
                </div> -->
                  <?php if ($this->session->flashdata('gagal_store')) { ?>
                      <div class="alert alert-danger col-md-12"> 
                        <?= $this->session->flashdata('gagal_store') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> 
                      </div>
                    <?php } ?>
                <form class="form-horizontal" action="<?=base_url('penghapusan/simpan')?>" autocomplete="off" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="id_aset" class="col-sm-3 col-form-label">Kode Aset</label>
                    <div class="col-sm-6">
                      <select name="id_aset" class="id_aset form-control" required>
                        <option value="">- Pilih --</option>
                        <?php foreach ($aset as $x): ?>
                          <option value="<?=$x['id_aset'];?>"><?=$x['kode_aset'];?> | <?=$x['nama_barang'];?></option>
                        <?php endforeach ?>      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah dihapuskan</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="jumlah" min="0" placeholder="Masukan Jumlah.." required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="satuan" class="col-sm-3 col-form-label">Faktor Penyebab</label>
                    <div class="col-sm-6">
                      <textarea name="faktor" placeholder="Masukan Faktor Penyebab.." class="form-control" required></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_penghapusan" class="col-sm-3 col-form-label">Tanggal Penghapusan</label>
                    <div class="col-sm-6">
                      <div class="input-group mb-3">
                        <input type="date" name="tgl_penghapusan" class="form-control" required>
                      </div>
                    </div>
                  </div>          
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rekomendasi Aset Dihapuskan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
            <div class="table-responsive">           
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Aset</th>
                  <th>Perolehan</th>
                  <th>Masa Manfaat</th>
                  <th>Pemakaian</th>
                  <th>Penyusutan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php  

                  $sql = "SELECT * FROM asets JOIN barang USING(id_barang) WHERE umur_ekonomis < YEAR(CURDATE()) -(tahun_perolehan-1) AND volume > 0";
                  $query = $this->db->query($sql)->result_array();

                ?>  
                <?php $no=1; foreach ($query as $row): ?>               
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$row['kode_aset'];?></td>
                  <td><?=$row['tahun_perolehan'];?></td>
                  <td><?=$row['umur_ekonomis'];?> Tahun</td>
                  <td>
                      <?php
                          $usia = date('Y')- ($row['tahun_perolehan']-1);
                          
                          if ($usia > $row['umur_ekonomis']) {
                            echo "<font color='red'>",$usia," Tahun</font>";
                          } else {
                            echo $usia," Tahun";
                          }                         
                        ?>
                  </td>
                  <td>
                    <?php
                      $i = 0;
                      $tahun_skrg = date("Y");
                      $rentang = ($tahun_skrg-$row['tahun_perolehan'])+1; 
                    for ($x=1; $x <= $rentang; $x++){

                      //Rumus
                      $tahun = $row['tahun_perolehan']+$i;
                      $tarif_penyusutan= (100/100)/$row['umur_ekonomis'];
                      $nilai_sisa = $tarif_penyusutan*$row['harga'];
                      $penyusutan = ($row['harga']-$nilai_sisa)/$row['umur_ekonomis'];
                      $akumulasi_penyusutan = $penyusutan*$x; 
                      $nilai_aset = $row['harga']-$akumulasi_penyusutan;

                      if($nilai_aset < $nilai_sisa){
                        break;
                      }
                    }

                    echo rupiah($akumulasi_penyusutan);
                    ?>                    
                  </td>
                  <td>
                    <a href="<?=base_url('penyusutan/detail/'.$row['id_aset'])?>" class="btn btn-success btn-sm">
                      <i class="fas fa-eye"></i>
                    </a>
               <!--      <a href="<?=base_url('penyusutan/hapuskan/'.$row['id_aset'])?>" class="btn btn-danger btn-sm tombol-penghapusan">
                      <i class="fas fa-power-off"></i>
                    </a> -->
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode Aset</th>
                  <th>Perolehan</th>
                  <th>Masa Manfaat</th>
                  <th>Pemakaian</th>
                  <th>Penyusutan</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
          </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

  $(document).ready(function() {
    $('.id_aset').select2({
      theme: "classic"
    });
  });
</script>

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


