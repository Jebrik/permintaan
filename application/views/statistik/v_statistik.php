  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Statistik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('home')?>">Home</a></li>
              <li class="breadcrumb-item active">Statistik</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
    foreach($kondisi as $row){
      $kon[] = $row->kon;
    }

    foreach($ktgr as $row){
      $nama_kategori[] = $row->nama_kategori;
    }

    foreach($kode as $data){
      $kategori[] = (float) $data->kategori;
    }
  ?>
  
  <?=json_encode($kategori);?>
  <script src="<?=base_url()?>src/backend/plugins/chart.js/Chart.min.js"></script>
  <script>
  $(function () {

    //Grafik Kondisi Aset
    var donutData = {
      labels: [
          'Baik', 
          'Renovasi',
          'Rusak' 
      ],
      datasets: [
        {
          data: <?=json_encode($kon);?>,
          backgroundColor : ['#00a65a', '#f39c12', '#f56954'],
        }
      ]
    }

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
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
      datasets: [
        {
          data: [<?=$bw;?>,<?=$ph;?>],
          backgroundColor : ['#00c0ef', '#f56954'],
        }
      ]
    }

    var jenisCanvas    = $('#pieJenis').get(0).getContext('2d')
    var pieJenisData   = jenisData;
    var jenisOptions   = {
      maintainAspectRatio : false,
      responsive : true,
    }

    var pieJenis = new Chart(jenisCanvas, {
      type: 'pie',
      data: pieJenisData,
      options: jenisOptions      
    })

    //Grafik Aset Kategori
    var areaChartData = {
      labels  : <?=json_encode($nama_kategori);?>,
      datasets: [
        {
          label               : 'Jumlah Aset',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?=json_encode($kategori);?>
        },
      ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })


  })
</script>