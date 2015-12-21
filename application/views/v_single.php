
<div class="container body-home">
	<div class="col-md-3">			
		<div class="box-artikel">			
			<?php 
			foreach($artikel as $a){
				?>				
				<p><a href="<?php echo base_url(); ?>blogger/single/<?php echo $a->id_artikel ?>" class="title-artikel-sidebar"><?php echo $a->judul ?></a></p>	
				<?php } ?>			
			</div>
			<div class="box-kategori">
				<ul>
					<li><p judul-sidebar><b>Kategori</b></p></li>
					<?php foreach($kategori as $k){ ?>
					<li><?php echo $k->kategori ?> <span class="badge pull-right"><?php echo $this->m_admin->tutorial_perkategori($k->id); ?></span></li>
					<?php } ?>
 
				</ul>
			</div>			
		</div>
		<div class="col-md-9">
			<?php 
			foreach($single as $s){
				?>
				<div class="col-md-12 box-artikel">					
					<div class="col-md-12">
						<h3><?php echo $s->judul ?></h3>
						<small><span class="glyphicon glyphicon-user"></span> <?php echo $s->username ?> <?php echo nbs(4) ?> <span class="glyphicon glyphicon-calendar"></span> <?php echo $s->tanggal ?></small>
						<br/>
						<br/>
						<a class="col-md-12">
							<img class="col-md-12" src="<?php echo base_url().'images/'.$s->foto ?>" alt="<?php echo $s->judul ?>">
						</a>
						<br/>
						<div style="margin-top:20px" class="col-md-12">
						<?php echo $s->isi_artikel ?>						
						</div>
					</div>
				</div>
				<?php } ?>
				<?php $v = & $this->validation ?>
				 <? if ($v->error_string) { ?>
  <div class="form_error">
   <?php echo $v->error_string; ?>
  </div>
<? } ?>
<?php if($success): ?>
				<div class="success">
 <span class="message_content">Data Sukses Disimpan</span>
</div>
<?php unset($v); endif; ?>
			<?
if($tguestbook_list)
{
 foreach($tguestbook_list as $value)
 {
  echo "<li><strong><u>".$value['nama']."</u></strong> ( ".$value['tanggal']." ): ".nl2br(parse_smileys($value['komentar'],"http://localhost/blogger/smileys/"))." <hr></li>";
 }
}
?>
<?php echo $page_links;?>
<?echo js_insert_smiley('bukutamu', 'komentar'); ?>
				<form name="bukutamu" method="post">
				<label>Nama</label><input name="nama" size="24" class="form-control" placeholder="isikan Nama lengkap anda" value="<?php echo $v->nama; ?>">
				<label>Email</label><input name="email" size="24" class="form-control" placeholder="name@example.com" value=<?php echo  $v->email; ?>>
				<label>Komentar</label><textarea  name="komentar" class="form-control" placeholder="isi komentar..."><?php echo $v->komentar; ?></textarea>
				<?php echo smiley_table; ?> 
				<br/>
				<button type="submit" value="Submit" class="btn btn-primary-xl" > Submit</button>
				<button type="reset" name="reset" value="Reset" class="btn btn-alert"> Reset</button>
				</form>
			</div>
		</div>