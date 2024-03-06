<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Penyusutan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item active">Penyusutan</li>
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
        <h3 class="card-title">
          Data Penyusutan Aset
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
        </div>
          <div class="card-body">
           <form action="<?=base_url('penyusutan/filter')?>" method="POST">
            <div class="row">
              <div class="col-md-4">
                <select name="id_kategori" class="form-control" required>
                  <option value="">- Pilih Kategori --</option>
                  <?php foreach ($kategori as $row): ?>
                    <option value="<?=$row['id_kategori'];?>"><?=$row['kode_kategori'];?> - <?=$row['nama_kategori'];?></option>
                  <?php endforeach ?>      
                </select>
              </div>
              <div class="col-md-4">
                <select name="tahun_perolehan" class="form-control" required>
                  <option value="">- Tahun Perolehan --</option>
                  <?php 
                  for($i = 2010 ; $i <= date('Y'); $i++){
                    echo "<option value='$i'>$i</option>";
                  }
                  ?>                          
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-outline-primary">Filter</button>
              </div>
              <div class="col-md-2">
                <button type="reset" class="btn btn-block btn-outline-danger">Reset</button>
              </div>              
            </div>
          </form>  
          <br/> 
          <div class="table-responsive">           
             <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Aset</th>
                  <th>Perolehan</th>
                  <th>Masa Manfaat</th>
                  <th>Pemakaian</th>
                  <th>Penyusutan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($pys as $row): ?>               
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$row['nama_barang'];?></td>
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
                  <th>Nama Aset</th>
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
          <div class="card-footer">
            
          </div>
          <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
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
<script>
  $('.tombol-penghapusan').on('click',function(e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Aset akan dihapuskan",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Aset!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  });
</script>