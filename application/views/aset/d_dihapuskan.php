<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Aset Dihapuskan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Data Aset</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('aset_dihapuskan')?>">Dihapuskan</a></li>
              <li class="breadcrumb-item active">Detail Aset</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Aset Dihapuskan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
             
          <?php foreach($aset as $d){?>
            <?php if ($d['qr_code'] != NULL): ?>
              <center>
                <img src="<?=base_url()?>src/img/qrcode/<?=$d['qr_code']; ?>" style="height:150px;width:150px;">
              </center>
              <br/>  
            <?php endif ?>                  
          <?php } ?>
            
           <table class="table table-striped" id="users">
              <tbody>
              <?php foreach($aset as $d){?>                 
                  <tr>                    
                      <td width="100px">Kode Aset</td>
                      <td width="50px">:</td>
                      <td><?=$d['kode_aset'] ?></td>
                  </tr>
                  <tr>                       
                      <td width="100px">Nama Aset</td>
                      <td width="50px">:</td>
                      <td><?=$d['nama_barang'] ?></td>
                  </tr>
                  <tr>
                      <td width="200px">Kategori Aset</td>
                      <td width="50px">:</td>
                      <td><?=$d['kode_kategori'] ?> - <?=$d['nama_kategori'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Merek</td>
                      <td width="50px">:</td>
                      <td><?=$d['merek'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Kondisi</td>
                      <td width="50px">:</td>
                      <td><?=$d['kondisi'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Tahun Perolehan</td>
                      <td width="50px">:</td>
                      <td><?=$d['tahun_perolehan'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Lokasi Aset</td>
                      <td width="50px">:</td>
                      <td><?=$d['nama_lokasi'] ?></td>
                  </tr>                 
                   <tr>
                      <td width="100px">Satuan</td>
                      <td width="50px">:</td>
                      <td><?=$d['satuan'];?></td>
                  </tr>
                  <tr>
                      <td width="100px">Volume</td>
                      <td width="50px">:</td>
                      <td><?=$d['volume'] ?></td>
                  </tr>
                  <tr>
                      <td width="100px">Nilai Aset</td>
                      <td width="50px">:</td>
                      <td><?=rupiah($d['harga']);?></td>
                  </tr>
                  <tr>
                      <td width="100px">Total Nilai Aset</td>
                      <td width="50px">:</td>
                      <td><?=rupiah($d['total_harga']);?></td>
                  </tr>
                  <tr>
                      <td width="100px">Status Aset</td>
                      <td width="50px">:</td>
                      <td><?=$d['status_aset'];?></td>
                  </tr>
                   <tr>
                      <td width="100px">Umur Ekonomis</td>
                      <td width="50px">:</td>
                      <td><?=$d['umur_ekonomis'];?> Tahun</td>
                  </tr>
                  <tr>
                      <td width="100px">Masa Pemakaian</td>
                      <td width="50px">:</td>
                      <td>
                        <?php
                          $usia = date('Y')-$d['tahun_perolehan'];
                          if ($usia < 0) {
                            echo " Aset sudah melewati umur ekonomis";
                          } else {
                            echo $usia," Tahun";
                          }                         
                        ?>
                      </td>
                  </tr>
                   <tr>
                      <td width="100px">Cara Perolehan</td>
                      <td width="50px">:</td>
                      <td><?=$d['jenis_bantuan'];?></td>
                  </tr>
               <?php } ?>     
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         <a href="<?=base_url('aset_dihapuskan')?>">
          <button type="button" class="btn btn-danger">Kembali</button>
        </a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
