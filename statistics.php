<?php include('include_top.php');

	if(isset($_GET['act']) && !empty($_GET['act'])){
		$db->referrer_update_total();
	}
	$referrers = $db->get_referrers();
	$referrers_num = count($referrers);
?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".statistiche_refresh").click(function(){
				window.location.href = "<?php echo $path_catapano; ?>/statistics.php";
			});
			$(".statistiche_azzera").click(function(){
				window.location.href = "<?php echo $path_catapano; ?>/statistics.php?act=zzr";
			});
		});
	</script>
	<section id="body_container">
		<table style="width:100%;">
		<?php for($i=0; $i<$referrers_num; $i++){ ?>
			<tr>
				<td style="text-align:right; padding:0px 10px; width:50%;"><?php echo $referrers[$i]['host']; ?></td>
				<td style="width:50%; padding:0px 10px; border-left:1px solid #ddd;"><?php echo $referrers[$i]['count']." / ".$referrers[$i]['total']; ?></td>
			</tr>
		<?php } ?>
			<tr>
				<td class="statistiche_refresh"><span>refresh</span></td>
				<td class="statistiche_azzera"><span>azzera</span></td>
			</tr>
		</table>
	</section>
<?php include('include_bottom.php'); ?>