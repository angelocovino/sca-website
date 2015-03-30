	<section id="foooter">
		<section id="menu_social_bottom">
		<?php
			$bottom_nomi = array("houzz", "linkedin", "twitter");
			$bottom_immagini = array("houzz.jpg", "linkedin.png", "twitter.jpg");
			$bottom_link = array("http://www.houzz.com/pro/salvatorecatapanoarchitects/salvatore-catapano-architects", "https://uk.linkedin.com/pub/salvatore-catapano/b/60a/795", "https://twitter.com/cocarchitects");
			$bottom_padding = array("0px 5px 2px 0px", "0px 5px 2px 0px", "0px 5px 2px 5px");
			for($i=0; $i<count($bottom_nomi); $i++){
		?>
			<a target="_blank" style="position:relative; <?php if($i==0){ echo "top:2px;"; }else{ echo "top:0px;"; } ?>" href="<?php echo $bottom_link[$i]; ?>">
				<img src="<?php echo $path_catapano."/images/".$bottom_immagini[$i]; ?>" alt="<?php echo $bottom_nomi[$i]; ?>" style="width:20px; padding:<?php echo $bottom_padding[$i]; ?>;" />
			</a>
		<?php
			}
		?>
		</section>
		&copy; Salvatore Catapano Architects
	</section>
</body>
</html>