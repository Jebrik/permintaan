<!-- Content Wrapper. Contains page content -->
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
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('penyusutan') ?>">Penyusutan</a></li>
            <li class="breadcrumb-item active">Detail Penyusutan</li>
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
              <h3 class="card-title">Detail Aset</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-striped" id="users">
                <tbody>

                  <tr>
                    <td width="100px">Kode Aset</td>
                    <td width="50px">:</td>
                    <td><?= $d['kode_aset'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Nama Aset</td>
                    <td width="50px">:</td>
                    <td><?= $d['nama_barang'] ?></td>
                  </tr>
                  <tr>
                    <td width="200px">Kategori Aset</td>
                    <td width="50px">:</td>
                    <td><?= $d['kode_kategori'] ?> - <?= $d['nama_kategori'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Merek</td>
                    <td width="50px">:</td>
                    <td><?= $d['merek'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Kondisi</td>
                    <td width="50px">:</td>
                    <td><?= $d['kondisi'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Tahun Perolehan</td>
                    <td width="50px">:</td>
                    <td><?= $d['tahun_perolehan'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Lokasi Aset</td>
                    <td width="50px">:</td>
                    <td><?= $d['nama_lokasi'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Satuan</td>
                    <td width="50px">:</td>
                    <td><?= $d['satuan']; ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Volume</td>
                    <td width="50px">:</td>
                    <td><?= $d['volume'] ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Nilai Aset</td>
                    <td width="50px">:</td>
                    <td><?= rupiah($d['harga']); ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Total Nilai Aset</td>
                    <td width="50px">:</td>
                    <td><?= rupiah($d['total_harga']); ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Status Aset</td>
                    <td width="50px">:</td>
                    <td><?= $d['status_aset']; ?></td>
                  </tr>
                  <tr>
                    <td width="100px">Umur Ekonomis</td>
                    <td width="50px">:</td>
                    <td><?= $d['umur_ekonomis']; ?> Tahun</td>
                  </tr>
                  <tr>
                    <td width="100px">Masa Pemakaian</td>
                    <td width="50px">:</td>
                    <td>
                      <?php
                      $usia = date('Y') - ($d['tahun_perolehan'] - 1);

                      if ($usia > $d['umur_ekonomis']) {
                        echo $usia, " Tahun - Aset sudah melewati umur ekonomis";
                      } else {
                        echo $usia, " Tahun";
                      }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="100px">Sumber Bantuan</td>
                    <td width="50px">:</td>
                    <td><?= $d['cara_perolehan']; ?></td>
                  </tr>

                </tbody>
              </table>
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
              <h3 class="card-title">Detail Penyusutan Aset</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <th>Akhir Tahun Ke</th>
                  <th>Tahun</th>
                  <th>Harga Perolehan</th>
                  <th>Penyusutan</th>
                  <th>Akumulasi Penyusutan</th>
                  <th>Nilai Akhir Aset</th>
                </thead>
                <tbody>
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?= rupiah($item['harga']) ?></td>
                  </tr>
                  <?php
                  $i = 0;
                  $tahun_skrg = date("Y");
                  $rentang = ($tahun_skrg - $item['tahun_perolehan']) + 1;
                  for ($x = 1; $x <= $rentang; $x++) {

                    //Rumus
                    $tahun = $item['tahun_perolehan'] + $i;
                    $tarif_penyusutan = (100 / 100) / $item['umur_ekonomis'];
                    $nilai_sisa = $tarif_penyusutan * $item['harga'];
                    $penyusutan = ($item['harga'] - $nilai_sisa) / $item['umur_ekonomis'];
                    $akumulasi_penyusutan = $penyusutan * $x;
                    $nilai_aset = $item['harga'] - $akumulasi_penyusutan;

                    if ($nilai_aset < $nilai_sisa || $akumulasi_penyusutan == 0) {
                      break;
                    }
                  ?>
                    <tr>
                      <td><?= $x; ?></td>
                      <td>
                        <?php if ($i == 0) {
                          echo $item['tahun_perolehan'];
                        } else {
                          echo $tahun;
                        }
                        $i++;
                        ?>
                      </td>
                      <td><?= rupiah($item['harga']) ?></td>
                      <td><?= rupiah($penyusutan); ?></td>
                      <td><?= rupiah($akumulasi_penyusutan); ?></td>
                      <td><?= rupiah($nilai_aset); ?></td>
                    </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="6"><b>Total Penyusutan :</b> <?= rupiah($akumulasi_penyusutan); ?></td>
                  </tr>
                </tbody>
              </table>
              <?php
              $usia = date('Y') - ($d['tahun_perolehan'] - 1);
              if ($akumulasi_penyusutan == 0 || $usia > $d['umur_ekonomis']) { ?>

                <br />
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  Aset <?= $d['nama_barang'] ?> direkomendasikan untuk dilakukan <strong>penghapusan</strong>
                  <p>
                    Klik <a href="<?= base_url('penghapusan'); ?>">Disini</a> untuk melakukan penghapusan aset
                  </p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

              <?php } ?>
              <br />
              <a href="<?= base_url('penyusutan') ?>">
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