<?php
$pg = $_SEO["permalink"];
?>

			<footer class="bg-l-gray is-relative has-text-centered">
				<div class="wrap">

					<p class="waypoint animation_bottom">
						Material sujeito à alteração. De acordo com a Lei no 4591/64, informamos que as imagens contidas neste material possuem apenas caráter de sugestão, reservando-nos o direito de alterar as especificações deste material publicitário, prevalecendo as informações destacadas no ato da venda, estabelecidas no contrato e memorial descritivo do empreendimento.
					</p>


					<div class="assinatura mt20 waypoint animation_bottom">
						<a class="mr5" href="https://quax.com.br" target="_blank">QUAX</a>
						+
						<a class="ml5" href="https://mosimanndesign.com.br/" target="_blank">MOSIMANN DESIGN</a>
					</div>

				</div>
			</footer>




			</div> <!-- /CLOSE SCROLL-CONTENT -->
	    </main> <!-- /MAIN -->



		<div class="bt-whatsbox">
			<a href="<?=LINK_WHATSAPP?>" target="_blank"><i class="fa fa-whatsapp color-white"></i></a>
		</div>



		<?php //include TEMPLATE."sections/cookies.php"; ?>



		<?php echo javascript_enqueue('home','return'); ?>



		<!-- INSERT CODE BODY -->
		<?php if( !IS_LIGHTHOUSE ) echo $qConfig->incorporar_body; ?>

	</body>
</html>