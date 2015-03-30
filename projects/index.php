<?php include('../include_top.php');
	$progetti = $db->getProjectAll();
	$progetti_num = count($progetti);
?>
	<section id="body_container">
		<section id="project_container">
			<ul id="project_list">
				<?php
					for($i=0; $i<$progetti_num; $i++){
				?>
						<li class="project_elem">
							<div class="project_image">
								<a href="project.php?no=<?php echo $progetti[$i]['id']; ?>">
									<img src="<?php echo $progetti[$i]['id']."_".$progetti[$i]['cover']; ?>.jpg" alt="<?php echo $progetti[$i]['nome']." | ".$progetti[$i]['location']." | ".$progetti[$i]['anno']; ?>" />
								</a>
							</div>
							<div class="project_title">
								<?php
									echo $progetti[$i]['nome'];
									echo "<br />";
									echo $progetti[$i]['location']." | ".$progetti[$i]['anno'];
								?>
							</div>
						</li>
				<?php
					}
				?>
			</ul>
			<div style="clear:both;font:0px Arial; margin-bottom:50px;">&nbsp;</div>
		</section>
	</section>
<?php include('../include_bottom.php'); ?>