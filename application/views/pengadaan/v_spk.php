<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proses SPK</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Keputusan Pengadaan</a></li>
            <li class="breadcrumb-item active">Nilai / Proses SPK</li>
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
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Aset</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                   <tr>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>No</b>.</td>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>Alternatif</b></td>
                     <td colspan="3" align="center"><b>Kriteria</b></td>
                   </tr>
                   <tr>
                     <td align="center"><b>Spesifikasi</b></td>
                     <td align="center"><b>Kualitas</b></td>
                     <td align="center"><b>Harga</b></td>
                   </tr>
                   <?php if (count($nilai)>0): ?>
                      <?php $no=1; foreach ($nilai as $row): ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['nama_aset'];?></td>
                        <td><?=$row['ket_spek'];?></td>
                        <td><?=$row['ket_nilai'];?></td>
                        <td><?=rupiah($row['harga']);?></td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" align="center">Data tidak tersedia.. silahkan tambah data</td>
                      </tr>
                    <?php endif ?>
                 </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Rating Kecocokan</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                   <tr>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>No</b>.</td>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>Alternatif</b></td>
                     <td colspan="3" align="center"><b>Kriteria</b></td>
                   </tr>
                   <tr>
                     <td align="center"><b>Spesifikasi</b></td>
                     <td align="center"><b>Kualitas</b></td>
                     <td align="center"><b>Harga</b></td>
                   </tr>
                   <?php if (count($nilai)>0): ?>
                      <?php $no=1; foreach ($nilai as $row): ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['nama_aset'];?></td>
                        <td style="text-align: center;"><?=$row['nilai_spek'];?></td>
                        <td style="text-align: center;"><?=$row['nilai_kualitas'];?></td>
                        <td style="text-align: center;"><?=rupiah($row['harga']);?></td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" align="center">Data tidak tersedia.. silahkan tambah data</td>
                      </tr>
                    <?php endif ?>
                 </table>
               </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hasil Perhitungan Normalisasi</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                   <tr>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>No</b>.</td>
                     <td rowspan="2" style="text-align: center; vertical-align: middle;"><b>Alternatif</b></td>
                     <td colspan="3" align="center"><b>Kriteria</b></td>
                   </tr>
                   <tr>
                     <td align="center"><b>Spesifikasi</b></td>
                     <td align="center"><b>Kualitas</b></td>
                     <td align="center"><b>Harga</b></td>
                   </tr>
                   <?php if (count($nilai)>0): ?>
                      <?php $no=1; foreach ($nilai as $row): ?>
                      <tr>
                        <td><?=$no++?></td>
                        <td><?=$row['nama_aset'];?></td>
                        <td style="text-align: center;">
                          <?=($row['nilai_spek']/$maxspek['maks_spek']);?>                          
                        </td>
                        <td style="text-align: center;">
                          <?=($row['nilai_kualitas']/$maxkual['maks_kualitas']);?>                           
                        </td>
                        <td style="text-align: center;">
                          <?=round(($row['harga']/$minharga['min_harga']),3);?>                           
                        </td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" align="center">Data tidak tersedia.. silahkan tambah data</td>
                      </tr>
                    <?php endif ?>
                 </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nilai Ranking</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered">
                   <tr>
                     <td><strong>Kode</strong></td>
                     <td><strong>Alternatif</strong></td>
                     <td><strong>Nilai</strong></td>
                   </tr>
                   <?php $no=1; foreach ($nilai as $row): 
                   $spek = ($row['nilai_spek']/$maxspek['maks_spek']);
                   $kual = ($row['nilai_kualitas']/$maxkual['maks_kualitas']);
                   $hrg = ($row['harga']/$minharga['min_harga']);
                   $nil = ($spek*0.3)+($kual*0.3)+($hrg*0.4);
                   ?>
                   <tr>
                     <td><?='V'.$no++;?></td>
                     <td><?=$row['nama_aset'];?></td>
                     <td>
                       <?=round($nil,3);?>
                     </td>
                   </tr>
                 <?php endforeach ?>
               </table>
               </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kesimpulan</h3>
              </div>

              <div class="card-body">
                <?php 
                  $no=1; 
                  $arr = array();

                  foreach ($nilai as $row){
                    $spek = ($row['nilai_spek']/$maxspek['maks_spek']);
                    $kual = ($row['nilai_kualitas']/$maxkual['maks_kualitas']);
                    $hrg = ($row['harga']/$minharga['min_harga']);
                    $nilai = round(($spek*0.3)+($kual*0.3)+($hrg*0.4),3);
                
                    $arr[] = $nilai.' yaitu V'.$no++.' dengan nama aset '.$row['nama_aset'];
                  } 

                  $output = max($arr);

                  echo "<p>Dari hasil perhitungan ranking diatas, maka pemilihan aset terbaik untuk pengadaan dengan nilai tertinggi ".$output;                
                ?>
              </div>  
            </div>  
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


  




