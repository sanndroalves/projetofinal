<?php
    session_start();
    ob_start();
    require_once 'Controller/UsuarioController.php';   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="view/funcionario/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="view/funcionario/assets/img/icon.png">
  <title>
    Imobiliária Avenus - Logar
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="view/funcionario/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="view/funcionario/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="view/funcionario/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="view/funcionario/assets/css/argon-dashboard.css?v=2.0.3" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Entrar</h4>
                  <p class="mb-0">Utilize seu usuário e seu senha</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST">
                    <div class="mb-3">
                      <input type="text" name="login" class="form-control form-control-lg" placeholder="Login" aria-label="Email">
                    </div>
                    <div class="mb-3">
                      <input type="password" name="senha" class="form-control form-control-lg" placeholder="Senha" aria-label="Password">
                    </div>
                    <div class="text-center">
                      <button type="submit" name="btnLogar" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-view/funcionario/assets/master/argon-dashboard-pro/view/funcionario/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">Imobiliária Avenus</h4>
                <p class="text-white position-relative">A melhor de todo o brasil.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="view/funcionario/assets/js/core/popper.min.js"></script>
  <script src="view/funcionario/assets/js/core/bootstrap.min.js"></script>
  <script src="view/funcionario/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="view/funcionario/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="view/funcionario/assets/js/argon-dashboard.min.js?v=2.0.3"></script>
</body>

</html>

<?php
    if(isset($_POST['btnLogar'])){
        $_SESSION['logado'] = call_user_func(array('UsuarioController', 'logar'));

        if($_SESSION['logado'] == true){
            $_SESSION['login'] = $_POST['login'];
            header('Location: index.php');
        }else{
            header('Location: ?error');
        }

        

        ob_end_flush();
    }
?>