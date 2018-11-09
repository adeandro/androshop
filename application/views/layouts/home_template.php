<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Andro Shop | <?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css') ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css') ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand">ANDRO Shop</a>
      </div>
      <div>
        <ul class="nav navbar-nav pull-right">
          <?php if (!$this->ion_auth->logged_in()): ?>
            <li><a href="<?php echo base_url('auth/register') ?>">Datar</a></li>
            <li><a href="<?php echo base_url('auth') ?>">Login <i class="fa fa-sign-in"></i></a></li>
          <?php elseif($this->ion_auth->logged_in()): ?>
              <?php if (!$this->ion_auth->is_admin()): ?>
                <?php 
                $user = $this->ion_auth->user()->row();
                echo "
                <li><a href='". base_url('home/chart') ."'><i class='fa fa-shopping-cart'></i>
                  
                </a></li>
                <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown'>". $user->username ." <i class='caret'></i> </a>
                  <ul class='dropdown-menu'>
                    <li><a href='". base_url('member') ."'>Dashboard <i class='fa fa-dashboard pull-right'></i></a></li>
                    <li><a href='". base_url('member/logout') ."'>Log Out <i class='fa fa-sign-out pull-right'></i></a></li>
                  </ul>
                </li>";
               ?>
              <?php elseif($this->ion_auth->is_admin()) : ?>
                <?php 
                $user = $this->ion_auth->user()->row();
                echo "
                <li><a href='#'><i class='fa fa-shopping-cart'></i></a></li>
                <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown'>". $user->username ." <i class='caret'></i> </a>
                  <ul class='dropdown-menu'>
                    <li><a href='". base_url('admin') ."'>Dashboard <i class='fa fa-dashboard pull-right'></i></a></li>
                    <li><a href='". base_url('admin/logout') ."'>Log Out <i class='fa fa-sign-out pull-right'></i></a></li>
                  </ul>
                </li>";
               ?>
              <?php endif ?>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="callout callout-info  ">
      <i class="fa fa-bullhorn"></i> Selamat datang di ANDROShop
    </div>
    
    <div class="row">
      <div class="col-xs-8">
        <div class="box box-primary">
          <?php echo $content ?>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="box box-warning">
          <div class="box-header with-border">
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" name="cari" placeholder="Cari product...">
                <button class="btn btn-block btn-default btn-flat"><i class="fa fa-search"></i></button>
              </div>
            </form>
            <br>
            <h3 class="box-title">Lates Product</h3>
          </div>
          <div class="box-body">
            <?php
              $this->load->model('product_model');
              $products = $this->product_model->get_product()->result();
              foreach ($products as $product) {
                if (!file_exists(base_url('assets/img/product/'.$product->gambar))) {
                  echo "<table class='table'>
                          <tr>
                            <td><img class='img-thumbnail' style='max-width:50px;' src='". base_url('assets/img/product/default.jpg') ."' alt='product'></td>
                            <td><a href='". base_url('home/show_product/'.$product->id) ."'>". $product->nama_product ."</a><p>". $product->nama_kategory ."</p></td>
                          </tr>
                        </table>";
                }
              }
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
</body>
</html>
