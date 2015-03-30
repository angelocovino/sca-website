<?php session_start();
	@require_once("class.db.php");
	$db = new database();
	if(!isset($_SESSION['uniqueref'])){
		if(
			isset($_SERVER['HTTP_REFERER']) &&
			!empty($_SERVER['HTTP_REFERER'])
		){
			$details = parse_url($_SERVER['HTTP_REFERER']);
			$db->referrer_add($details['host']);
		}else{
			$db->referrer_add("selfie");
		}
		$_SESSION['uniqueref']=1;
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php
	$localhost = array('127.0.0.1','::1');
	if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
		$path_catapano = "http://localhost/catapano";
	}else{
		$path_catapano = "http://salvatorecatapanoarchitects.co.uk";
	}
?>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Angelo Covino,	angelotm">
	<meta name="description" content="Salvatore Catapano Architects, SCA, 6 Ostade Road, Brixton, SW2 2BA, London">
	<meta name="keywords" content="Salvatore, Catapano, Salvatore Catapano, Catapano Salvatore, Salvatore Catapano Architect, Salvatore Catapano Architects, SCA, SCArchitects, Me2Architects, Me 2 Architects, Me2 Architects, Me 2Architects, architect, architects, london, 6 ostade road brixton, brixton, ostade road, design, designer, project, director, refurbishment, masteplanning, masterplan, residential, extension, new development, competition, collaboration, interiors, new building, luxury interiors, luxury, landscape, arb, registrated architect">
	<meta name="robots" content="index,follow">
	
	<title>Salvatore Catapano Architects</title>
	<link rel="stylesheet" href="<?php echo $path_catapano; ?>/css/html5reset-1.6.1.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $path_catapano; ?>/css/style.php" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<?php
		if(isset($pagina_index) && $pagina_index==true){
	?>
	<style type="text/css">
	body {overflow:hidden;}
	</style>
	<?php
		}
	?>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#statisticoso").click(function(){
				window.location.href = "<?php echo $path_catapano; ?>/statistics.php";
			});
		});
	</script>
	<span id="statisticoso" style="position:absolute; z-index:200; left:0; top:0; font:0.1px Arial; width:5px; height:10px; background:transparent;">&nbsp;</span>
	<header id="menu_container">
		<section id="menu_title"><a href="<?php echo $path_catapano; ?>">Salvatore Catapano Architects</a></section>
		<nav class="menu">
			<ul class="menu_list">
				<?php
					$url = explode('/', $_SERVER['REQUEST_URI']);
					$url = array_filter($url);
					
					//$menu_entries = array("Projects", "Practice", "Contact");
					$menu_entries = array("Projects", "Contact");
					for($i=0; $i<count($menu_entries); $i++){
						echo "<li";
						if(in_array(strtolower($menu_entries[$i]), $url)){
							echo " class='li_active'";
						}
						echo ">";
						echo "<a href='".$path_catapano."/".strtolower($menu_entries[$i])."/'>";
						echo $menu_entries[$i];
						echo "</a>";
						echo "</li>";
					}
				?>
			</ul>
		</nav>
		<?php
			if(strcasecmp("Contact", end($url))==0){
		?>
		<nav class="menu">
			<ul class="menu_list">
				<?php
					//$menu_entries = array("London", "Napoli");
					$menu_entries = array("London");
					for($i=0; $i<count($menu_entries); $i++){
						echo "<li>";
						echo "<a class='contact_place";
						echo " place_".strtolower($menu_entries[$i]);
						if($i==0){
							echo " a_active";
						}
						echo "'>";
						echo $menu_entries[$i];
						echo "</a>";
						echo "</li>";
					}
				?>
			</ul>
		</nav>
		<?php
			}else if(in_array("projects", $url)){
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".project_title").fadeOut(0);
				$(".project_elem").mouseenter(function(){
					$(this).find(".project_title").fadeIn(0);
				});
				$(".project_elem").mouseleave(function(){
					$(this).find(".project_title").fadeOut(0);
				});
			});
		</script>
		<nav class="menu">
			<ul class="menu_list">
				<?php
					$menu_entries = array("All", "Residential", "Collaboration", "Competition");
					for($i=0; $i<count($menu_entries); $i++){
						echo "<li>";
						echo "<a class='project_type_".strtolower($menu_entries[$i]);
						if(
							(strcasecmp("projects", end($url))==0 && $i==0) || 
							(strcasecmp("residential", end($url))==0 && $i==1) || 
							(strcasecmp("collaboration", end($url))==0 && $i==2) || 
							(strcasecmp("competition", end($url))==0 && $i==3)
						){
							echo " a_active";
						}
						echo "' ";
						if($i==0){
							echo "href='".$path_catapano."/projects'>";
						}else{
							echo "href='".$path_catapano."/projects/".strtolower($menu_entries[$i])."/'>";
						}
						echo $menu_entries[$i];
						echo "</a>";
						echo "</li>";
					}
				?>
			</ul>
		</nav>
		<?php
			}
		?>
		<section id="menu_social">
			<a target="_blank" href="http://architects-register.org.uk/architect/079615H">
				<img src="<?php echo $path_catapano; ?>/images/arb.jpg" alt="arb logo" />
			</a>
		</section>
		<!--
		<nav class="menu_reverse">
			<ul class="menu_list">
				<?php
					$menu_entries = array("About", "Credits");
					for($i=0; $i<count($menu_entries); $i++){
						echo "<li>";
						//echo "<a href='".$path_catapano."/".strtolower($menu_entries[$i])."/'>";
						echo $menu_entries[$i];
						//echo "</a>";
						echo "</li>";
					}
				?>
			</ul>
		</nav>
		-->
	</header>