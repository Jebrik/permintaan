<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active">Pengadaan</li>
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
        <h3 class="card-title">
          Cari Pengadaan Aset
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
              <form action="<?=base_url('laporan/search_pengadaan')?>" method="post">
                <div class="row">
                    <div class="col-4">
                        <select name="id_lokasi" class="form-control" required>
                          <option value="">- Lokasi Aset --</option>
                          <?php foreach ($lokasi as $row): ?>
                            <option value="<?=$row['id_lokasi'];?>"><?=$row['nama_lokasi'];?></option>
                          <?php endforeach ?>                              
                        </select>
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" name="tahun_pengadaan" placeholder="-- Tahun Pengadaan --">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-block btn-outline-primary">Cari</button>
                    </div>
                    <div class="col">
                      <button type="reset" class="btn btn-block btn-outline-danger">Reset</button>
                    </div>              
                </div>
              </form>
              <a href="<?=base_url('laporan/print_pengadaan/').$this->input->post('id_lokasi').'/'.$this->input->post('tahun_pengadaan')?>" target="_blank" class="btn btn-danger mt-4">
                <i class="fa fa-print" aria-hidden="true"></i> Print
              </a>
              <a href="<?=base_url('laporan/export_pengadaan/').$this->input->post('id_lokasi').'/'.$this->input->post('tahun_pengadaan')?>" class="btn btn-success mt-4">
                <i class="fa fa-file" aria-hidden="true"></i> Export Excel
              </a>
              <div class="mt-4">
                <div class="col">
                  <b>Lokasi Aset :</b> <?=$lok['nama_lokasi']?>
                </div>
              </div>
              <table class="table table-bordered mt-4">
                 <thead>
                   <tr>
                     <th>No.</th>
                     <th>Nama</th>
                     <th>Satuan</th>
                     <th>Volume</th>
                     <th>Harga (Rp.)</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php $no=1; foreach ($pnd as $row): ?>                 
                   <tr>
                     <td><?=$no++;?></td>
                     <td><?=$row['nama_aset'];?></td>
                     <td><?=$row['satuan'];?></td>
                     <td><?=$row['volume'];?></td>
                     <td><?=laporan($row['harga_satuan']);?></td>
                   </tr>
                   <?php endforeach ?>
                 </tbody>
               </table> 
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
