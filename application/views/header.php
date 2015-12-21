<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery-ui/jquery-ui.css' ?>">
	<title>
		<?php 
		foreach($pengaturan as $p){
			?>
			<?php echo $p->judul_web ?>
			<?php 
		}	
		?>
	</title>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui.js' ?>"></script>
</head>
<body>	
	<div id="container">
		<nav class="navbar navbar-default">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php 
					foreach($pengaturan as $p){
						?>
						<a style="color:white;font-weight:bold" class="navbar-brand" href="#"><?php echo $p->judul_web ?></a>
						<?php 
					}	
					?>
				</div>
 
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">							
					 <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a></li>
       
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kategori <span class="caret"></span></a>
         <?php foreach($kategori as $k){ ?>
        <ul class="dropdown-menu" role="menu">
            <li><a style="color:black" href="<?php echo base_url().'blogger/kategori/'.$k->id ?>"><?php echo $k->kategori ?></a></li>            
          </ul>
          <?php } ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Artikel <span class="caret"></span></a>
         <?php foreach($artikel as $a){ ?>
        <ul class="dropdown-menu" role="menu">
            <li><a style="color:black" href="<?php echo base_url().'blogger/single/'.$a->id_artikel ?>"><?php echo $a->judul ?></a></li>            
          </ul>
          <?php } ?>
        <li><a href="<?php echo base_url(). 'login'?>">Login</a></li>
      </ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>