<?php
    session_start();

    require_once 'controller/UsuarioController.php';   
    require_once 'controller/ImovelController.php';
?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="view/Funcionario/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="view/Funcionario/assets/img/icon.png">
  <title>
    Imobiliária Avenus
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="view/Funcionario/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="view/Funcionario/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="view/Funcionario/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="view/Funcionario/assets/css/argon-dashboard.css?v=2.0.3" rel="stylesheet" />
  
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="view/Funcionario/assets/img/icon.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Avenus</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Início</span>
          </a>
        </li>
        <?php
          if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
            require_once 'view/Funcionario/menuUser.php';
          }else{
            require_once 'view/Funcionario/menuNormal.php';
          }
        ?>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mb-0">Imobiliária Avenus</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <?php 
            if(!isset($_SESSION['logado'])){
          ?>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="entrar.php" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Entrar</span>
              </a>
            </li>
          </ul>
          <?php 
            }else{
              ?>
                <ul class="navbar-nav  justify-content-end">
                  <li class="nav-item d-flex align-items-center text-white">
                  <a href="sair.php" class="nav-link text-white font-weight-bold px-0">
                    <i class="fa fa-back me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sair</span>
                  </a>
                  </li>
                </ul>
              <?php
            }
          ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      
    <?php

    if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){

    if(isset($_GET['action'])){

        //criar user
        if($_GET['action'] == 'criarUsuario'){
            require_once 'view/funcionario/cadUsuario.php';
        }

        //listar user
        if($_GET['action'] == 'listarUsuarios'){
            require_once 'view/Funcionario/listUsuario.php';
        }

        //editar user
        if($_GET['action'] == 'usuarioEditar'){
            $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
            require_once 'view/Funcionario/cadUsuario.php';
        }

        //apagar user
        if($_GET['action'] == 'usuarioExcluir'){
            $usuario = call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
            require_once 'view/Funcionario/listUsuario.php';
        }

        

        //criar imovel
        if($_GET['action'] == 'criarImovel'){
            require_once 'view/Funcionario/cadImovel.php';
        }

        //listar imoveis
        if($_GET['action'] == 'listarImoveis'){
            require_once 'view/Funcionario/listImovel.php';
        }

        if($_GET['action'] == 'imovelExcluir'){
            $imovel = call_user_func(array('ImovelController', 'excluir'), $_GET['id']);
            require_once 'view/Funcionario/listImovel.php';
        }
        

        if($_GET['action'] == 'imovelEditar'){
            $imovel = call_user_func(array('ImovelController', 'editar'), $_GET['id']);
            require_once 'view/Funcionario/cadImovel.php';
        }

        
    }else{
       require_once 'view/Funcionario/normalFunc.php'; 
    }
    
    }else{
      if(isset($_GET['action'])){
        if($_GET['action'] == 'listarImoveisNormal'){
        require_once 'view/Funcionario/listNormal.php';

        }
      }else{
          require_once 'view/Funcionario/normal.php';
        }
    }
?>

      <footer class="footer mt-0 pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-lg-start" style="color: black;">
                Criado por Alessandro Alves de Araújo, em @<script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="view/Funcionario/assets/js/core/popper.min.js"></script>
  <script src="view/Funcionario/assets/js/core/bootstrap.min.js"></script>
  <script src="view/Funcionario/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="view/Funcionario/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="view/Funcionario/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="view/Funcionario/assets/js/argon-dashboard.min.js?v=2.0.3"></script>
</body>

</html>