<!DOCTYPE html>
<html>
<head>
<title>
     <?php 
        $pengaturan = $this->m_admin->lihat_pengaturan('judul_web');
        echo $pengaturan[0]->judul_web;
     ?> 
  </title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/admin.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/jquery-ui/jquery-ui.css' ?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/ckeditor/ckeditor.js' ?>"></script>  
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Blogger</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url().'admin/' ?>">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url().'admin/kategori' ?>">Categori<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url(). 'admin/artikel' ?>">Article</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url().'admin/pengaturan' ?>">Web</a></li>            
          </ul>
        </li>
      </ul>
      <p><?php $username; ?></p>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url().'login/logout' ?>"><span class='glyphicon glyphicon-lock'></span> Logout</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo strtoupper($this->session->userdata('nama')) ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">            
            <li><a href="<?php echo base_url().'admin/ganti_password' ?>">Ganti password</a></li>            
            <li class="divider"></li>
            <li><a href="<?php echo base_url().'login/logout' ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>