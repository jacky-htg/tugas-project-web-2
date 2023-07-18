<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <!-- jQuery -->
    <script src="<?= base_url('vendors');?>/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('vendors');?>/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= base_url('vendors');?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('vendors');?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('vendors');?>/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('vendors');?>/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <link href="<?= base_url('vendors');?>/select2/dist/css/select2.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?= base_url('vendors');?>/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url('vendors');?>/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('vendors');?>/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('vendors');?>/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('vendors');?>/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('vendors');?>/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('vendors');?>/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('vendors');?>/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('build');?>/css/custom.min.css" rel="stylesheet">
    <link href="<?= base_url('vendors');?>/switchery/dist/switchery.min.css" rel="stylesheet">
    
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url();?>" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url();?>images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?= $this->include('layouts/sidebar_menu');?>

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <?= $this->include('layouts/top_navigation');?>

        <?= $this->renderSection('content');?>

        <?= $this->include('layouts/footer');?>
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?= base_url('vendors');?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('vendors');?>/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('vendors');?>/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url('vendors');?>/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= base_url('vendors');?>/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url('vendors');?>/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('vendors');?>/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?= base_url('vendors');?>/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('vendors');?>/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('vendors');?>/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('vendors');?>/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('vendors');?>/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('vendors');?>/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('vendors');?>/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('vendors');?>/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('vendors');?>/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('vendors');?>/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('vendors');?>/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= base_url('vendors');?>/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url('vendors');?>/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('vendors');?>/moment/min/moment.min.js"></script>
    <script src="<?= base_url('vendors');?>/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('vendors');?>/switchery/dist/switchery.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('build');?>/js/custom.min.js"></script>
	
  </body>
</html>
