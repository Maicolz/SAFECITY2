<?php 
$conexion = mysqli_connect('localhost:3306','root','','safecity');

// Consulta SQL para obtener los totales de reportes por tipo
$sql = "SELECT tr.Nombre as tipo_reporte, COUNT(r.IdTipoReporte) as total
        FROM reportes r
        INNER JOIN tipodereporte tr ON r.IdTipoReporte = tr.IdTipoReporte
        GROUP BY tr.Nombre";
$resultado = mysqli_query($conexion, $sql);

// Inicializar arrays para almacenar los datos
$labels = [];
$data = [];

while($row = mysqli_fetch_assoc($resultado)) {
    $labels[] = $row['tipo_reporte'];
    $data[] = (int)$row['total'];
}
?>

<head>
 

  <!-- Favicons -->
  <link href="../assets\img\favicon.png" rel="icon">
  <link href="../assets\img\apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https:\\fonts.gstatic.com" rel="preconnect">
  <link href="https:\\fonts.googleapis.com\css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets\vendor\bootstrap\css\bootstrap.min.css" rel="stylesheet">
  <link href="../assets\vendor\bootstrap-icons\bootstrap-icons.css" rel="stylesheet">
  <link href="../assets\vendor\boxicons\css\boxicons.min.css" rel="stylesheet">
  <link href="../assets\vendor\quill\quill.snow.css" rel="stylesheet">
  <link href="../assets\vendor\quill\quill.bubble.css" rel="stylesheet">
  <link href="../assets\vendor\remixicon\remixicon.css" rel="stylesheet">
  <link href="../assets\vendor\simple-datatables\style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
<link href="../assets\css\style.css" rel="stylesheet">



</head>

<body>


  <!-- <main id="main" class="main"> -->
  

    <div class="pagetitle">
      <h1>Mis reportes</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            



            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reportes</h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Crímenes',
                        data: <?php echo json_encode($data); ?>,
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      xaxis: {
                        categories: <?php echo json_encode($labels); ?>,
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                  </script>

                  


                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                

                <div class="card-body">

                  <h5 class="card-title">Mis reportes  </h5>

                  <table class="table table-borderless datatable">
                    <thead>
                    <tr>
                        <th scope="col text-info ">#CODIGO</th>
                        <th scope="col">Latitud</th>
                        <th scope="col">Longitud</th>
                        <th scope="col">FECHA REPORTE</th>
                        <th scope="col">TIPO REPORTE</th>
                      </tr>

                    </thead>
                     

                    <?php 
                        $sql="SELECT re.IdReporte,re.Latitud,re.Logintud,re.FechaReporte,tire.Nombre as TipoDeReporte FROM reportes re INNER JOIN tipodereporte tire WHERE re.IdTipoReporte = tire.IdTipoReporte";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                    ?>
              
                      <tr>
                        
                        <td SCOPE="row"><?php echo $mostrar['IdReporte']?></td>
                        <td><?php echo $mostrar['Latitud']?></td>
                        <td><?php echo $mostrar['Logintud']?></td>
                        <td><?php echo $mostrar['FechaReporte']?></td>
                        <!-- <td><?php echo $mostrar['TipoDeReporte']?></td> -->

                        <td>
                          <?php
                            switch($mostrar['TipoDeReporte']) {
                              case 'VENTA DE DROGAS':
                                echo '<span class="badge bg-success">' . $mostrar['TipoDeReporte'] . '</span>';
                                break;
                              case 'ASALTOS':
                                echo '<span class="badge bg-primary">' . $mostrar['TipoDeReporte'] . '</span>';
                                break;
                              case 'VANDALISMO':
                                echo '<span class="badge bg-dark">' . $mostrar['TipoDeReporte'] . '</span>';
                                break;  
                                case 'ROBO VEHICULAR':
                                  echo '<span class="badge bg-warning">' . $mostrar['TipoDeReporte'] . '</span>';
                                  break;  
                              // Agrega más casos según los tipos de reporte y sus badges
                              default:
                                echo $mostrar['TipoDeReporte'];
                            }
                          ?>
                        </td>

                      </tr>
                      
                    <?php 
                        }
                    ?>
                  </table>
                </div>
              </div>
            </div>




            <!-- Recent Sales -->
            

            <!-- Top Selling -->
           
          </div>
        </div><!-- End Left side columns -->

       
      </div>
    </section>
    </div>

  <!-- </main>End #main -->

  <!-- ======= Footer ======= -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>