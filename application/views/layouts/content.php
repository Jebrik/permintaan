  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <!-- Breadcumb Saya Hapus
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><
        </div>
      </div>
      -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!--
        <div class="alert alert-info">
            <h5> 
              <?php

              date_default_timezone_set("Asia/Jakarta");

              $b = time();
              $hour = date("G", $b);

              if ($hour >= 0 && $hour <= 11) {
                echo '<i class="icon fas fa-cloud-sun"></i>';
                echo " Selamat Pagi.. " . $this->session->userdata('nama_user');
              } else if ($hour >= 12 && $hour <= 14) {
                echo '<i class="icon far fa-sun"></i>';
                echo " Selamat Siang.. " . $this->session->userdata('nama_user');
              } else if ($hour >= 15 && $hour <= 17) {
                echo '<i class="icon far fa-sun"></i>';
                echo " Selamat Sore.. " . $this->session->userdata('nama_user');
              } else if ($hour >= 17 && $hour <= 18) {
                echo '<i class="icon fas fa-cloud"></i>';
                echo " Selamat Petang.. " . $this->session->userdata('nama_user');
              } else if ($hour >= 19 && $hour <= 23) {
                echo '<i class="icon fas fa-cloud-moon"></i>';
                echo " Selamat Malam.. " . $this->session->userdata('nama_user');
              }

              ?>

            </h5>
            Selamat Datang di Website Sistem Informasi Inventarisasi Aset 
          </div>
          -->
        <?php if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2') : ?>
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $wujud + $hapuskan; ?></h3>

                  <p>Total Aset</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-home"></i>
                </div>
                <a href="#" class="small-box-footer">Aset Berwujud + Aset Dihapuskan <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $wujud; ?></h3>

                  <p>Aset Berwujud</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-desktop"></i>
                </div>
                <a href="<?= base_url('aset_wujud') ?>" class="small-box-footer">Selengkapnya
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $hapuskan; ?></h3>

                  <p>Aset Dihapuskan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-trash-a"></i>
                </div>
                <a href="<?= base_url('aset_dihapuskan') ?>" class="small-box-footer">Selengkapnya
                  <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        <?php endif ?>
        <!-- Small boxes (Stat box) -->
        <!-- /.row (main row) -->

        <!-- <img src="<?= base_url('src/aset.jpg') ?>" width="100%" /> -->
        <div class="row">
          <div class="col-md-6">

            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Aset berdasarkan Kondisi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Aset berdasarkan Jenis</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieJenis" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Aset berdasarkan Kategori</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  foreach ($kondisi as $row) {
    $kon[] = $row->kon;
  }

  foreach ($ktgr as $row) {
    $nama_kategori[] = $row->nama_kategori;
  }

  foreach ($kode as $data) {
    $kategori[] = (float) $data->kategori;
  }
  ?>

  <?= json_encode($kategori); ?>
  <script src="<?= base_url() ?>src/backend/plugins/chart.js/Chart.min.js"></script>
  <script>
    $(function() {

      //Grafik Kondisi Aset
      var donutData = {
        labels: [
          'Baik',
          'Renovasi',
          'Rusak'
        ],
        datasets: [{
          data: <?= json_encode($kon); ?>,
          backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
        }]
      }

      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData = donutData;
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }

      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

      //Grafik Jenis Aset
      var jenisData = {
        labels: [
          'Berwujud',
          'Dihapuskan'
        ],
        datasets: [{
          data: [<?= $bw; ?>, <?= $ph; ?>],
          backgroundColor: ['#00c0ef', '#f56954'],
        }]
      }

      var jenisCanvas = $('#pieJenis').get(0).getContext('2d')
      var pieJenisData = jenisData;
      var jenisOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }

      var pieJenis = new Chart(jenisCanvas, {
        type: 'pie',
        data: pieJenisData,
        options: jenisOptions
      })

      //Grafik Aset Kategori
      var areaChartData = {
        labels: <?= json_encode($nama_kategori); ?>,
        datasets: [{
          label: 'Jumlah Aset',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: <?= json_encode($kategori); ?>
        }, ]
      }

      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = jQuery.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      barChartData.datasets[0] = temp0

      var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })


    })
  </script>