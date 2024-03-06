<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengadaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pengadaan</a></li>
            <li class="breadcrumb-item active">Detail Data</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
     <div class="container-fluid">
        <div class="row">
           <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Pengadaan Aset</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped" id="users">
                  <tbody>
                    <?php foreach($item as $d){?>                 
                      <tr>                    
                        <td width="100px">Nama</td>
                        <td width="50px">:</td>
                        <td><?=$d['nama_user'] ?></td>
                      </tr>
                      <tr>                       
                        <td width="100px">Jabatan</td>
                        <td width="50px">:</td>
                        <td><?=$d['jabatan'] ?></td>
                      </tr>
                      <tr>
                        <td width="200px">Penempatan Aset</td>
                        <td width="50px">:</td>
                        <td><?=$d['nama_lokasi'] ?></td>
                      </tr>
                      <tr>
                        <td width="100px">Nama Aset</td>
                        <td width="50px">:</td>
                        <td><?=$d['nama_aset'] ?></td>
                      </tr>
                      <tr>
                        <td width="100px">Volume</td>
                        <td width="50px">:</td>
                        <td><?=$d['volume'] ?></td>
                      </tr>
                      <tr>
                        <td width="100px">Tahun Pengadaan</td>
                        <td width="50px">:</td>
                        <td><?=$d['tahun_pengadaan'] ?></td>
                      </tr>
                       <tr>
                        <td width="100px">Satuan</td>
                        <td width="50px">:</td>
                        <td><?=$d['satuan'] ?></td>
                      </tr>
                      <tr>
                        <td width="100px">Harga Satuan</td>
                        <td width="50px">:</td>
                        <td><?=rupiah($d['harga_satuan']) ?></td>
                      </tr>
                      <tr>
                        <td width="100px">Total Harga</td>
                        <td width="50px">:</td>
                        <td><?=rupiah($d['harga_satuan']*$d['volume']) ?></td>
                      </tr>                  
                      <tr>
                        <td width="100px">Tahun Pengadaan</td>
                        <td width="50px">:</td>
                        <td><?=$d['tahun_pengadaan'];?></td>
                      </tr>
                      <tr>
                        <td width="100px">Waktu Input</td>
                        <td width="50px">:</td>
                        <td><?=$d['created_at'];?></td>
                      </tr>
                      <tr>
                        <td width="100px">Status</td>
                        <td width="50px">:</td>
                        <td>
                          <?php if ($d['status']=='0'): ?>
                            <span class="badge badge-danger">Belum Disetujui</span>
                            <?php else: ?>
                              <span class="badge badge-success">Disetujui</span>
                            <?php endif ?>
                          </td>
                        </tr>                 
                      <?php } ?>     
                    </tbody>
                  </table>
                  <br/>
                  <a href="<?=base_url('pengadaan')?>">
                    <button type="button" class="btn btn-danger">Kembali</button>
                  </a>
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
  <!-- /.content-wrapper -->
