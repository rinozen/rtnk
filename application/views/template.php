<!DOCTYPE html>
<html>
<head>
	<title>Rinotronik</title>
	<style>		
		@import url("<?=$url?>assets/css/warna.css");
		@keyframes blinker {  
		  50% { opacity: 0.25; }
		}
	</style>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/sidebar.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/layout.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/input.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/css/konten.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/fa/css/fontawesome-all.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$url?>assets/jQuery/jquery-ui.css"/>
</head>
<body data-url="<?=$url?>">	
	<div class="overlay"></div>
	<div class="password">
		<div class="bpass">
			<i class="fas fa-times-circle fa-2x close"></i>
			<div id="input">
				<i class="fas fa-user"></i> <input id="pass" type="password" autocomplete="false" placeholder="Masukkan Password" / >
			</div>
			<div class="salah blink">Password Salah..</div>
		</div>
	</div>

	<?=$sidebar?>

	<div class="loading">
		<i class="fas fa-spin fa-spinner fa-2x"></i> Silahkan tunggu..
	</div>

	<div class="konten">
		<?=$konten?>
	</div>

	<script type="text/javascript" src="<?=$url?>assets/jQuery/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="<?=$url?>assets/jQuery/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=$url?>assets/js/sidebar.js"></script>
	<script type="text/javascript" src="<?=$url?>assets/js/js.js"></script>
	<script type="text/javascript" src="<?=$url?>assets/js/viewJS/<?=$js?>.js"></script>	
	<script type="text/javascript" src="<?=$url?>assets/js/angka.js"></script>
</body>
</html>