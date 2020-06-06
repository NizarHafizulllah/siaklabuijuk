      <section class="content">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      
      
       <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $perempuan ?></h3>
                  <p>Perempuan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $laki_laki ?></h3>
                  <p>Laki-laki</p>
                </div>
                <div class="icon">
                  <i class="fa fa-male"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $penduduk ?></h3>
                  <p>Penduduk</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $keluarga ?></h3>
                  <p>Keluarga</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-8">
              <div id="container" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
            </div>
            <div class="col-md-4">
              <div id="container1" style="min-width: 310px; height: 300px; margin: 0 auto"></div>
            </div>
          </div>
        
      </section>

<script type="text/javascript">
 $(function () {

    $(document).ready(function () {

      $('#container1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Presentase Status Perkawinan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Kawin',
                y: <?php echo $kawin; ?>
            }, {
                name: 'Belum Kawin',
                y: <?php echo $blm_kwn; ?>
            }, {
                name: 'Cerai Hidup',
                y: <?php echo $cr_hidup; ?>
            }, {
                name: 'Cerai Mati',
                y: <?php echo $cr_mati; ?>
            }]
        }]
    });






      $('#container').highcharts({
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statik Penduduk Menurut Umur'
    },
    subtitle: {
        text: 'Source: Kantor Desa Labu Ijuk'
    },
    xAxis: {
        categories: [
            'Lansia (>60)',
            'Dewasa (24-59)',
            'Remaja (14-23)',
            'Anak (2-14)',
            'Bayi (<2)'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jiwa'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} jiwa</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total',
        data: [<?php  echo $lansia.', '.$dewasa.', '.$remaja.', '.$anak.', '.$bayi ?>]

    }, {
        name: 'Wanita',
        data: [<?php  echo $wanita_lansia.', '.$wanita_dewasa.', '.$wanita_remaja.', '.$wanita_anak.', '.$wanita_bayi ?>]

    }, {
        name: 'Pria',
        data: [<?php  echo $pria_lansia.', '.$pria_dewasa.', '.$pria_remaja.', '.$pria_anak.', '.$pria_bayi ?>]

    }]
});
    });
});

</script>