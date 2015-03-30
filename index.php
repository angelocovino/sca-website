<?php
	$pagina_index=true;
	include('include_top.php');
	$progetti = $db->getProjectAll();
	$progetti_num = count($progetti);
?>
	<script type="text/javascript">
		$(document).ready(function(){
			var idx = 0;
			var idx_new;
			
			$(".div_slider_0").addClass("div_attivo").removeClass("div_disattivo");
			
			function next_photo(){
				$(".td_right").unbind("click", next_photo);
				clearInterval(intervallo);
				scomparo_e_riapparo(tempo, tempodelay);
				
				$(".div_slider_"+idx).animate({"left":"-"+$("#td_center").css("width")},scomparo_via, function(){
					$(".div_slider_"+idx).addClass("div_disattivo").removeClass("div_attivo");
					$(".div_slider_"+idx).css({"left":"0px"});
				});
				
				idx_new = idx+1;
				if(idx_new><?php echo ($progetti_num-1);?>){idx_new=0;}
				$(".div_slider_"+idx_new).css({"left":""+$("#td_center").css("width")});
				$(".div_slider_"+idx_new).addClass("div_attivo").removeClass("div_disattivo");
				$(".div_slider_"+idx_new).animate({"left":"0px"},scomparo_via, function(){
					idx=idx_new;
					idx_new++;
					if(idx_new><?php echo ($progetti_num-1);?>){idx_new=0;}
					$(".td_right").bind("click", next_photo);
					intervallo = setInterval(function(){$(".td_right").click();},tempo);
				});
			};
			$(".td_right").bind("click", next_photo);
			
			/*
			$(".td_right").fadeOut(500);
			$(".td_left").fadeOut(500);
			$("div[class^=div_]").mouseenter(function(){
				if(in_funzione==false){
					$(".td_right").fadeIn(500);
					$(".td_left").fadeIn(500);
				}
			});
			
			$("div[class^=div_]").mouseleave(function(){
				if(in_funzione==false){
					$(".td_right").fadeOut(500);
					$(".td_left").fadeOut(500);
				}
			});
			*/
			function scomparo_e_riapparo(tempo, tempodelay){
				$(".td_right").fadeOut(tempodelay);
				$(".td_left").fadeOut(tempodelay);
				$(".td_right").delay(scomparo_via).fadeIn(tempodelay);
				$(".td_left").delay(scomparo_via).fadeIn(tempodelay);
			}
			
			var is_inpause = false;
			$(".td_img").click(function(){
				if(is_inpause==false){
					clearInterval(intervallo);
					is_inpause=true;
				}else{
					intervallo = setInterval(function(){$(".td_right").click();},0);
					is_inpause=false;
				}
			});
			
			function prev_photo(){
				$(".td_left").unbind("click", prev_photo);
				clearInterval(intervallo);
				scomparo_e_riapparo(tempo, tempodelay);
				
				$(".div_slider_"+idx).animate({"left":""+$("#td_center").css("width")},scomparo_via, function(){
					$(".div_slider_"+idx).addClass("div_disattivo").removeClass("div_attivo");
					$(".div_slider_"+idx).css({"left":"0px"});
				});
				
				idx_new = idx-1;
				if(idx_new<0){idx_new=<?php echo ($progetti_num-1);?>;}
				$(".div_slider_"+idx_new).css({"left":"-"+$("#td_center").css("width")});
				$(".div_slider_"+idx_new).addClass("div_attivo").removeClass("div_disattivo");
				$(".div_slider_"+idx_new).animate({"left":"0px"},scomparo_via, function(){
					idx=idx_new;
					idx_new++;
					if(idx_new><?php echo ($progetti_num-1);?>){idx_new=0;}
					$(".td_left").bind("click", prev_photo);
					intervallo = setInterval(function(){$(".td_left").click();},tempo);
				});
			};
			$(".td_left").bind("click", prev_photo);
			
			var tempodelay = 100;
			var scomparo_via = 650;
			var tempo = 5000;
			var intervallo = null;
			intervallo = setInterval(function(){$(".td_right").click();},tempo);
		});
	</script>
	<table style="position:relative; top:62px; width:100%; height:calc(100% - 113px); background:transparent; overflow:hidden;"><tr>
		<td id="td_center" style="text-align:center; vertical-align:middle; background:transparent; width:770px; height:100%; overflow:hidden;">
			<div class="td_left">&nbsp;</div>
			<?php for($i=0; $i<$progetti_num; $i++){ ?>
				<div class="div_slider_<?php echo $i;?> div_disattivo" style="position:absolute; left:0; top:0; background:transparent; height:100%; width:100%;">
					<table style="width:100%; height:100%;"><tr>
						<td style="text-align:center; vertical-align:middle;">
							<img class="td_img" src="projects/<?php echo $progetti[$i]['id']."_".$progetti[$i]['cover']; ?>.jpg" style="display:inline-block; max-width:770px; height:auto; vertical-align:middle;" alt="<?php echo $progetti[$i]['nome']." | ".$progetti[$i]['location']." | ".$progetti[$i]['anno']; ?>" />
							<div class="td_description">
								<a href="projects/project.php?no=<?php echo $progetti[$i]['id']; ?>">
									<?php echo $progetti[$i]['nome']." | ".$progetti[$i]['location']." | ".$progetti[$i]['anno']; ?>
								</a>
							</div>
						</td>
					</tr></table>
				</div>
			<?php } ?>
			<div class="td_right">&nbsp;</div>
		</td>
	</tr></table>
		<!--
		<td id="" style="width:20px; background:#eee">&nbsp;</td>
		<td id="" style="width:20px; background:#eee">&nbsp;</td>
	<section id="body_container">
		<div id="sa_slider_container">
			<img src="sketch.jpg"/>
			<img src="sketch.jpg"/>
		</div>
	</section>
		-->
<?php include('include_bottom.php'); ?>