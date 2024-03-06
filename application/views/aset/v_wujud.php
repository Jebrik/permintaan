<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <li class="breadcrumb-item active">Berwujud</li>
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
          <a href="<?=base_url('aset_wujud/tambah')?>" class="btn btn-block bg-gradient-primary">
            Tambah Aset
          </a>
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
        </div>
          <div class="card-body">
              <form action="<?=base_url('aset_wujud/filter')?>" method="POST">
              <div class="row">
                  <div class="col-3">
                    <select name="id_kategori" class="form-control" required>
                      <option value="">- Pilih Kategori --</option>
                      <?php foreach ($kategori as $row): ?>
                        <option value="<?=$row['id_kategori'];?>"><?=$row['kode_kategori'];?> - <?=$row['nama_kategori'];?></option>
                      <?php endforeach ?>      
                    </select>
                  </div>
                  <div class="col-3">
                    <select name="tahun_perolehan" class="form-control" required>
                        <option value="">- Tahun Perolehan --</option>
                        <?php 
                        for($i = 2010 ; $i <= date('Y'); $i++){
                          echo "<option value='$i'>$i</option>";
                        }
                        ?>                          
                    </select>
                  </div>
                  <div class="col-3">
                    <select name="kondisi" class="form-control" required>
                      <option value="">- Kondisi --</option>
                      <option value="Baik">Baik</option>
                      <option value="Renovasi">Renovasi</option>
                      <option value="Rusak">Rusak</option>     
                    </select>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-block btn-outline-primary">Filter</button>
                  </div>
                  <div class="col">
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
                  <th>Kode Aset</th>
                  <th>Nama</th>
                  <th>Volume</th>
                  <th>Nilai Aset</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($aset as $row): ?>               
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$row['kode_aset'];?></td>
                  <td><?=$row['nama_barang'];?></td>
                  <td align="center"><?=$row['volume'];?></td>
                  <td><?=rupiah($row['harga']);?></td>
                  <td>
                    <a href="<?=base_url('aset_wujud/detail/'.$row['id_aset'])?>" class="btn btn-success btn-sm">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?=base_url('aset_wujud/edit/'.$row['id_aset'])?>" class="btn btn-info btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?=base_url('aset_wujud/hapus/'.$row['id_aset'])?>" class="btn btn-danger btn-sm tombol-hapus">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode Aset</th>
                  <th>Nama</th>
                  <th>Volume</th>
                  <th>Nilai Aset</th>
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