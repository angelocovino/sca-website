<?php include('../include_top.php');
	if(
		!isset($_GET['no']) ||
		empty($_GET['no'])
	){
		header("location: ".$path_catapano);
		exit(0);
	}
	$progetti = $db->getProjectOne($_GET['no']);
?>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php if($progetti['residential']==1){?> $(".project_type_residential").addClass("a_active");
			<?php }elseif($progetti['collaboration']==1){?> $(".project_type_collaboration").addClass("a_active");
			<?php }elseif($progetti['competition']==1){?> $(".project_type_competition").addClass("a_active");
			<?php } ?>
			var idx = 0;
			$(".img_0").addClass("img_attiva").removeClass("img_disattiva");
			$(".photo_0").addClass("photo_attiva").removeClass("photo_disattiva");
			$("img[class^=img_]").click(function(){
				idx = $(this).parent().index();
				$(".photo_attiva").addClass("photo_disattiva").removeClass("photo_attiva");
				$(".photo_"+idx).addClass("photo_attiva").removeClass("photo_disattiva");
				$(".img_attiva").addClass("img_disattiva").removeClass("img_attiva");
				$(this).addClass("img_attiva").removeClass("img_disattiva");
			});
			$("img[class^=photo_]").click(function(){
				idx++;
				if(idx><?php echo ($progetti['nimgs']-1); ?>){idx=0;}
				$("img.img_"+idx).click();
			});
			$(document).keydown(function(e) {
				switch(e.which) {
					case 37: // left
						idx--;
						if(idx<0){idx=<?php echo ($progetti['nimgs']-1); ?>;}
						$("img.img_"+idx).click();
						//alert("left");
						e.preventDefault();
					break;
					case 39: // right
						idx++;
						if(idx><?php echo ($progetti['nimgs']-1); ?>){idx=0;}
						$("img.img_"+idx).click();
						//alert("right");
						e.preventDefault();
					break;
					default: return;
				}
			});
			
			var asd = parseInt(($("#project_photos").outerHeight(true) - 86)/60);
			var marginbottom = $("#project_details table").css("margin-bottom");
			var marginbottom_int = marginbottom.substr(0, marginbottom.length - 2);
			var finale = parseInt(marginbottom_int);
			finale = finale + (asd*60);
			$("#project_details table").css({"margin-bottom":" "+finale+"px"});
		});
	</script>
	<section id="body_container">
		<section id="project_details">
			<table><tr>
				<td>
					<?php for($i=0; $i<$progetti['nimgs']; $i++){ ?>
						<img class="<?php echo "photo_".$i." photo_disattiva project_photo"; ?>" src="<?php echo $progetti['id']."_".$i; ?>.jpg" alt="<?php echo $progetti['nome']." | ".$progetti['location']." | ".$progetti['anno']; ?>" />
					<?php } ?>
				</td>
			</tr></table>
		</section>
	</section>
	
	<section id="project_photos">
		<?php echo $progetti['nome']." | ".$progetti['location']." | ".$progetti['anno']; ?>
		<ul id="project_photos_list">
			<?php for($i=0; $i<$progetti['nimgs']; $i++){ ?>
				<li>
					<img <?php echo "class='img_".$i." img_disattiva' "; ?> src="<?php echo $progetti['id']."_".$i; ?>.jpg" alt="<?php echo $progetti['nome']." | ".$progetti['location']." | ".$progetti['anno']; ?>" />
				</li>
			<?php } ?>
		</ul>
		<div style="clear:both; font:0px Arial;">&nbsp;</div>
	</section>
<?php include('../include_bottom.php'); ?>