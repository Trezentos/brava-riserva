<?php
$pg = $_SEO["permalink"];
?>

			<footer class="bg-primary is-relative has-text-centered">
				<div class="wrap">
					<div class="content">
                        <p class="waypoint animation_bottom text">
                            Informamos que as ilustrações contidas neste material possuem apenas caráter de sugestão. Os móveis, assim como materiais de acabamento apresentados nas ilustrações e plantas, não constituem parte integrande do contrato. O apartamento será entregue conforme indicado no memorial descritivo, podendo haver modificações do projeto estrutural sem aviso prévio.
                            <br>
                            Imagens meramete ilustrativas.
                        </p>


                        <div class="assinatura mt20 waypoint animation_bottom">
                            <p>© 2026 Clarus - Todos os direitos reservados.</p>

                            <a class="mr5" href="https://quax.com.br" target="_blank">Desenvolvimento QUAX.</a>
                        </div>
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