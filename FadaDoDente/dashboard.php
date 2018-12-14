<?php

// You'd put this code at the top of any "protected" page you create

// Always start this first

session_start();

if ( isset( $_SESSION['login'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: login.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Fada do Dente</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <!-- Graph CSS -->
  <link href="css/lines.css" rel='stylesheet' type='text/css' />
  <link href="css/amostra_paciente.css" rel="stylesheet"> 
  <link href="css/menu.css" rel='stylesheet' type='text/css' />
  <link href="css/font-awesome.css" rel="stylesheet"> 
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <link href="css/custom.css" rel="stylesheet">
  <!-- Metis Menu Plugin JavaScript -->
  <script src="js/metisMenu.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- Graph JavaScript -->
  <script src="js/d3.v3.js"></script>
  <script src="js/rickshaw.js"></script>
  <?php include('conecta.php') ?>
</head>
<body>
  <div id="wrapper">
    <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="logout.php"><img src="images/fadadodente.png" width="50" height="28"></a>
      </div> 
      <!-- /.navbar-header -->

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><i class="fas fa-bars"></i></a>
          <ul class="dropdown-menu">
            <!-- <li class="m_2"><a href="amostra_usuario.php"><i class="fa fa-user"></i> Perfil </a></li> -->
            <li style="max-width: 50px;" class="m_2"><a href="logout.php"><i class="fa fa-power-off"></i> Sair </a></li>  
          </ul>
        </li>
      </ul>
      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <?php
          include('menu_dinamico.php');
          echo $menu;
          ?>
        </div>
        <br>
        <center><a class="novaconsulta" href="cadastro_consulta.php"><i class="fas fa-plus-square"></i> Nova consulta</a></center>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
      <div class="graphs">
        <div class="col_3">
          <div class="col-md-3 col-sm-6 widget widget1">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-tag icon-rounded"></i>
              <div class="stats">
                <?php

                $res_totalReg = $pdo->prepare("SELECT COUNT(*) AS totalReg FROM tb_consulta WHERE data_registro_consulta >= curdate()");
                $res_totalReg->execute();
                $total = $res_totalReg->fetch(PDO::FETCH_OBJ);

                ?>
                <h5><strong><?php echo $total_de_registros = $total->totalReg; ?></strong></h5>
                <span>Novas consultas</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 widget widget1">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-check user1 icon-rounded"></i>
              <div class="stats">
                <?php

                $res_totalReg = $pdo->prepare("SELECT COUNT(*) AS totalReg FROM tb_consulta WHERE data_registro_consulta < curdate()");
                $res_totalReg->execute();
                $total = $res_totalReg->fetch(PDO::FETCH_OBJ);

                ?>
                <h5><strong><?php echo $total_de_registros = $total->totalReg; ?></strong></h5>
                <span>Consultas Feitas</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 widget widget1">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-users user2 icon-rounded"></i>
              <div class="stats">
                <?php

                $res_totalReg = $pdo->prepare("SELECT COUNT(*) AS totalReg FROM tb_paciente");
                $res_totalReg->execute();
                $total = $res_totalReg->fetch(PDO::FETCH_OBJ);

                ?>
                <h5><strong><?php echo $total_de_registros = $total->totalReg; ?></strong></h5>
                <span>Pacientes</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 widget">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
              <div class="stats">
                <?php

                $res_totalReg = $pdo->prepare("SELECT SUM(valor_consulta) AS totalReg FROM tb_consulta");
                $res_totalReg->execute();
                $total = $res_totalReg->fetch(PDO::FETCH_OBJ);

                ?>
                <h5><strong>R$<?php echo $total_de_registros = $total->totalReg; ?></strong></h5>
                <span>Toral Recebido</span>
              </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="col_1">
          <div class="col-md-6 span_7">	
            <div class="cal1 cal_2">
              <div class="clndr">
                <div class="clndr-controls">
                  <div class="clndr-control-button">
                    <p class="clndr-previous-button">previous</p>
                  </div>
                  <div class="month">July 2015</div>
                  <div class="clndr-control-button rightalign">
                    <p class="clndr-next-button">next</p>
                  </div>
                </div>
                <table class="clndr-table" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td class="day adjacent-month last-month calendar-day-2015-06-28">
                        <div class="day-contents">28</div>
                      </td>
                      <td class="day adjacent-month last-month calendar-day-2015-06-29">
                        <div class="day-contents">29</div>
                      </td>
                      <td class="day adjacent-month last-month calendar-day-2015-06-30">
                        <div class="day-contents">30</div>
                      </td>
                      <td class="day calendar-day-2015-07-01">
                        <div class="day-contents">1</div>
                      </td>
                      <td class="day calendar-day-2015-07-02">
                        <div class="day-contents">2</div>
                      </td>
                      <td class="day calendar-day-2015-07-03">
                        <div class="day-contents">3</div>
                      </td>
                      <td class="day calendar-day-2015-07-04">
                        <div class="day-contents">4</div>
                      </td>
                    </tr>
                    <tr>
                      <td class="day calendar-day-2015-07-05">
                        <div class="day-contents">5</div>
                      </td>
                      <td class="day calendar-day-2015-07-06">
                        <div class="day-contents">6</div>
                      </td>
                      <td class="day calendar-day-2015-07-07">
                        <div class="day-contents">7</div>
                      </td>
                      <td class="day calendar-day-2015-07-08">
                        <div class="day-contents">8</div>
                      </td>
                      <td class="day calendar-day-2015-07-09">
                        <div class="day-contents">9</div>
                      </td>
                      <td class="day calendar-day-2015-07-10">
                        <div class="day-contents">10</div>
                      </td>
                      <td class="day calendar-day-2015-07-11">
                        <div class="day-contents">11</div>
                      </td>
                    </tr>
                    <tr>
                      <td class="day calendar-day-2015-07-12">
                        <div class="day-contents">12</div>
                      </td>
                      <td class="day calendar-day-2015-07-13">
                        <div class="day-contents">13</div>
                      </td>
                      <td class="day calendar-day-2015-07-14">
                        <div class="day-contents">14</div>
                      </td>
                      <td class="day calendar-day-2015-07-15">
                        <div class="day-contents">15</div>
                      </td>
                      <td class="day calendar-day-2015-07-16">
                        <div class="day-contents">16</div>
                      </td>
                      <td class="day calendar-day-2015-07-17">
                        <div class="day-contents">17</div>
                      </td>
                      <td class="day calendar-day-2015-07-18">
                        <div class="day-contents">18</div>
                      </td>
                    </tr>
                    <tr>
                      <td class="day calendar-day-2015-07-19">
                        <div class="day-contents">19</div>
                      </td>
                      <td class="day calendar-day-2015-07-20">
                        <div class="day-contents">20</div>
                      </td>
                      <td class="day calendar-day-2015-07-21">
                        <div class="day-contents">21</div>
                      </td>
                      <td class="day calendar-day-2015-07-22">
                        <div class="day-contents">22</div>
                      </td>
                      <td class="day calendar-day-2015-07-23">
                        <div class="day-contents">23</div>
                      </td>
                      <td class="day calendar-day-2015-07-24">
                        <div class="day-contents">24</div>
                      </td>
                      <td class="day calendar-day-2015-07-25">
                        <div class="day-contents">25</div>
                      </td>
                    </tr>
                    <tr>
                      <td class="day calendar-day-2015-07-26">
                        <div class="day-contents">26</div>
                      </td>
                      <td class="day calendar-day-2015-07-27">
                        <div class="day-contents">27</div>
                      </td>
                      <td class="day calendar-day-2015-07-28">
                        <div class="day-contents">28</div>
                      </td>
                      <td class="day calendar-day-2015-07-29">
                        <div class="day-contents">29</div>
                      </td>
                      <td class="day calendar-day-2015-07-30">
                        <div class="day-contents">30</div>
                      </td>
                      <td class="day calendar-day-2015-07-31">
                        <div class="day-contents">31</div>
                      </td>
                      <td class="day adjacent-month next-month calendar-day-2015-08-01">
                        <div class="day-contents">1</div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6 span_8">
            <div class="activity_box">
              <div class="scrollbar" id="style-2">
                <div class="activity-row">
                  <div class="col-xs-3 activity-img"><img src='images/3.png' class="img-responsive" alt=""/></div>
                  <div class="col-xs-9 activity-desc" style="padding-bottom: 15px">
                    <h5>Nome do paciente<!-- Puxar do banco --></h5>
                    <p>Nome do dentista<!-- Puxar do Banco --></p>
                    <p>Descrição da Consulta<!-- Puxar do Banco --></p>
                    <p>8:03<!-- Horario --></p>
                  </div>
                  <div class="clearfix"> </div>
                </div>
                <div class="activity-row">
                  <div class="col-xs-3 activity-img"><img src='images/3.png' class="img-responsive" alt=""/></div>
                  <div class="col-xs-9 activity-desc" style="padding-bottom: 15px">
                    <h5>Nome do paciente<!-- Puxar do banco --></h5>
                    <p>Nome do dentista<!-- Puxar do Banco --></p>
                    <p>Descrição da Consulta<!-- Puxar do Banco --></p>
                    <p>8:03<!-- Horario --></p>
                  </div>
                  <div class="clearfix"> </div>
                </div>
                <div class="activity-row">
                  <div class="col-xs-3 activity-img"><img src='images/3.png' class="img-responsive" alt=""/></div>
                  <div class="col-xs-9 activity-desc" style="padding-bottom: 15px">
                    <h5>Nome do paciente<!-- Puxar do banco --></h5>
                    <p>Nome do dentista<!-- Puxar do Banco --></p>
                    <p>Descrição da Consulta<!-- Puxar do Banco --></p>
                    <p>8:03<!-- Horario --></p>
                  </div>
                  <div class="clearfix"> </div>
                </div>
                <div class="activity-row1">
                  <div class="col-xs-3 activity-img"><img src='images/3.png' class="img-responsive" alt=""/></div>
                  <div class="col-xs-9 activity-desc" style="padding-bottom: 15px">
                    <h5>Nome do paciente<!-- Puxar do banco --></h5>
                    <p>Nome do dentista<!-- Puxar do Banco --></p>
                    <p>Descrição da Consulta<!-- Puxar do Banco --></p>
                    <p>8:03<!-- Horario --></p>
                  </div>
                  <div class="clearfix"> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="span_11" style="padding: 0;border: 0;">
            <div class="col-md-6 col_4">
              <link rel="stylesheet" href="css/clndr.css" type="text/css" />
              <script src="js/underscore-min.js" type="text/javascript"></script>
              <script src= "js/moment-2.2.1.js" type="text/javascript"></script>
              <script src="js/clndr.js" type="text/javascript"></script>
              <script src="js/site.js" type="text/javascript"></script>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div>
            <center><p id="textopreto">© 2018 Fada do Dente. Todos os Direitos Reservados. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desenvolvido por &nbsp;&nbsp;<a href="http://sw5.com.br/" target="_blank"><img id="logojf" src="images/sw5.png" width="75" height="39"></a></p></center>
          </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>