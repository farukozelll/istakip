<?php 
include 'header.php';

$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?><link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<!-- Begin Page Content -->
<script type="text/javascript">
	var genislik = $(window).width()   
	if (genislik < 768) {
		function yenile(){
			$('#sidebarToggleTop').trigger('click');
		}
		setTimeout("yenile()",1);
	}
</script>
<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Site Ayarları</h5>   
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate>		
				<div class="form-row mb-3">
					<div class="file-loading">
						<input class="form-control" id="sitelogosu" name="site_logo" type="file">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Başlığı</label>
						<input type="text" required class="form-control" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>" placeholder="Site Başlığı">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Açıklaması</label>
						<input type="text" required class="form-control" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>" placeholder="Site Açıklaması (En Fazla 250 Karakter)">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Site Sahibi</label>
						<input type="text" required class="form-control" name="site_sahibi" value="<?php echo $ayarcek['site_sahibi'] ?>" placeholder="Site Sahibi">
					</div>
				</div>

				<button type="submit" name="genelayarkaydet" class="btn btn-primary">Kaydet</button>
			</form>	


		</div>
		<div class="card-footer">
			<div class="form-row">
				<p>Scriptin Ücretli Ve Çok Daha Fazla Gelişmiş Özelliklere Sahip Sürümünü İncelemek İçin <span><strong><a href="https://link.aksoyhlc.net/aksoyhlc-crm" target="_blank">Buraya Tıklayın</a></strong></span></p>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>
