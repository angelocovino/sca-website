<?php include('../include_top.php'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#napoli").fadeOut(0);
			$(".contact_place").click(function(e){
				e.preventDefault();
				$(".contact_place").removeClass("a_active");
				$(this).addClass("a_active");
				var classi = $(this).attr("class").toString().split(' ');
				if(jQuery.inArray("place_napoli", classi)!=-1){
					$("#london").fadeOut(0);
					$("#napoli").delay(0).fadeIn(0);
				}else{
					$("#napoli").fadeOut(0);
					$("#london").delay(0).fadeIn(0);
				}
				return false;
			});
		});
	</script>
	<section id="body_container">
		<section id="london">
				<table style="background:transparent; min-width:770px;">
					<tr>
						<td style="position:relative; background:transparent; width:220px;">
							<span style="position:absolute; top:0; left:0;">
								Salvatore Catapano Architects Ltd
							</span>
							<span style="position:absolute; bottom:0; left:0;">
								<span class="azzurrino">A</span>|
								<span style="margin-left:15px;">6 Ostade Road, SW2 2BA, London</span><br />
								<span class="azzurrino">T</span>|
								<span style="margin-left:15px;">+44 2084730298</span><br />
								<span class="azzurrino">M</span>|
								<span style="margin-left:15px;">+44 7411060166</span><br />
								<span class="azzurrino">E</span>|
								<span style="margin-left:15px;"><a href="mailto:info@salvatorecatapanoarchitects.co.uk">info@salvatorecatapanoarchitects.co.uk</a></span>
							</span>
						</td>
						<td style="background:transparent; width:calc(100% - 220px);">
							<img src="maps.jpg" style="width:100%;" />
						</td>
					</tr>
				</table>
			<!--
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4972.900069520223!2d-0.11448365278010408!3d51.449893228641415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604393204f5d1%3A0xd929bf8f7af6c791!2sBrixton%2C+London!5e0!3m2!1sen!2suk!4v1420303930020" width="90%" height="60%" frameborder="0" style="border:0"></iframe>
			-->
		</section>
		<section id="napoli">
			Coming soon
			<!--
			Salvatore Catapano<br />
			0044 07123456789<br />
			<br />
			casa casa casa<br />
			Brixton, 081, Napoli, IT<br />
			<br />
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4972.900069520223!2d-0.11448365278010408!3d51.449893228641415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604393204f5d1%3A0xd929bf8f7af6c791!2sBrixton%2C+London!5e0!3m2!1sen!2suk!4v1420303930020" width="90%" height="60%" frameborder="0" style="border:0"></iframe>
			-->
		</section>
	</section>
<?php include('../include_bottom.php'); ?>