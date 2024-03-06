<link rel="stylesheet" href="<?=base_url()?>src/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Barang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Data Master</a></li>
            <li class="breadcrumb-item active">Barang</li>
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
          <a href="<?=base_url('barang/tambah')?>" class="btn btn-block bg-gradient-primary">
            Tambah Barang
          </a>
        </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Tahun Perolehan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($barang as $row): ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$row['nama_kategori'];?></td>
                    <td><?=$row['nama_barang'];?></td>
                    <td><?=$row['merek'];?></td>
                    <td><?=$row['tahun_perolehan'];?></td>
                    <td>
                       <a href="<?=base_url('barang/edit/'.$row['id_barang'])?>" class="btn btn-info btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?=base_url('barang/hapus/'.$row['id_barang'])?>" class="btn btn-danger btn-sm tombol-hapus">
                          <i class="fas fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Tahun Perolehan</th>
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
        "zeroRecords": "Data masih kosong",
        "sSearch": "Cari"
      }
    });
  });
</script>