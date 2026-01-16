<?php

# GET DATABASE --------------------------------------------------------------------------------------------------- 

# BANNERS
$qBanners = $db->get_results("SELECT * FROM ".$tables['BANNERS']." WHERE status=1 ORDER BY ordem ASC");

# GALERIA LAZER
$qGaleria1 = $db->get_results("SELECT * FROM ".$tables['GALERIA_IMG']." WHERE ativo=1 AND id_galeria=2 ORDER BY ordem ASC");

# GALERIA APARTAMENTO
$qGaleria2 = $db->get_results("SELECT * FROM ".$tables['GALERIA_IMG']." WHERE ativo=1 AND id_galeria=1 ORDER BY ordem ASC");

# OBRAS - GALERIA
//$qObras = $db->get_results("SELECT * FROM ".$tables['EMPREENDIMENTOS_IMG']." WHERE ativo=1 AND categoria='obras' ORDER BY ordem ASC");

# -----------------------------------------------------------------------------------------------------------------



# ADD JS + CSS EXTRA
if( !IS_LIGHTHOUSE )
{
	add_style([
		'styles/css/owl.carousel.min.css',
		'styles/css/owl.theme.default.min.css',
		'styles/css/jquery.fancybox.min.css'
	]);

	add_javascript([
		'owl.carousel.min.js',
		'jquery.maskedinput.js',
		'jquery.cycle2.min.js',
		'jquery.fancybox.min.js',
        'ios.js',
	]);
}


get_header();
?>

<!-- BANNER -->
<section class="section-banners waypoint animation_top_d1">
	<div 
		class="cycle-slideshow" 
		data-cycle-slides=".li" 
		data-cycle-timeout="12000" 
		data-cycle-pause-on-hover="false" 
		data-cycle-log="false"
		data-cycle-speed="1000"
	>

		<?php if( count($qBanners) > 1 ) { ?>
            <div class="cycle-pager waypoint animation_scale animated"></div>
            <div class="cycle-prev animation_left_dd2 animated"><?php get_svg_arrow_prev()?></div>
            <div class="cycle-next animation_right_dd2 animated"><?php get_svg_arrow_next()?></div>
		<?php } ?>


		<?php
            foreach($qBanners as $rs)
            {
                if( empty($rs->video) )
                {
		?>

		<div class="li" style="background-image: url(<?=HTTP_UPLOADS_IMG.(!$MOBILE ? $rs->imagem : $rs->imagem_mobile); ?>); ">

			<div class="wrap is-relative">
				<div class="txt-banner waypoint animation_bottom_dd3 animated">
					<div class="h1 secondary-font"><?=$rs->titulo?></div>

					<?php if( $rs->link ){ ?>
					<a href="<?=$rs->link; ?>" target="<?=($rs->destino_cta=="_self"?"":"_blank"); ?>"
                       class="btn padding-top:23px_windows is-secondary  is-uppercase"><span class="primary-font"><?=$rs->texto_cta; ?></span>
					</a>
					<?php } ?>
				</div>
			</div>

		</div>

		<?php }else{ ?>

		<div class="li video">
			<iframe width="100%" height="800"
				src="https://www.youtube.com/embed/<?=$rs->video?>?autoplay=1&mute=1&loop=1&playlist=<?=$rs->video?>&controls=0&modestbranding=1&showinfo=0"
				title="test" frameborder="0" allow="loop; accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; modestbranding" allowfullscreen></iframe>
		</div>

		<?php
			} 
		}
		?>
    	
	</div>
</section>









<section class="section-intro bg-l-gray pb70 pb0-mobile waypoint animation_bottom_d1 animated" id="empreendimento">
	<div class="wrap mt0-mobile">

		<div class="columns is-mobile is-multiline">
			<div class="column is-4-widescreen is-4-desktop is-5-tablet is-12-mobile mt30 mt0-mobile pr0 pr10-mobile">

				<h2 class="waypoint animation_bottom">
					Se a vida é um mar<br>
					de possibilidades, o Plaza Beach Residence é um mergulho no inesquecível.
				</h2>

				<hr class="waypoint animation_scale">

				<p class="mt40 waypoint animation_bottom">
					Inspirado no encontro do sol com a brisa litorânea entrega uma combinação única de iluminação e ventilação natural. Um conceito para representar o frescor marinho em todas as temporadas de praia.
					<br><br>
					Tudo pensando a partir de uma arquitetura que reverencia a silhueta das ondas em espaços fluidos e integrados, enquanto universos de lazer ambientam a sua liberdade.
					<br><br>
					Uma obra criada para garantir o seu conforto e bem-estar o ano inteiro.
				</p>

			</div>

			<div class="column is-2-widescreen is-narrow-desktop is-narrow-tablet pr0-tablet pr0-tablet is-hidden-mobile"></div>

			<div class="column is-6-widescreen is-7-desktop is-5-tablet is-12-mobile pl60 mt10 pl40-tablet pl0-mobile pb0-mobile mt50-mobile is-relative">

				<picture>
					<source srcset="<?=IMG?>img-intro.webp" media="(max-width: 578px)">
					<source srcset="<?=IMG?>img-intro.webp" media="(min-width: 579px)">
					<img src="<?=IMG?>img-intro.webp" alt="" class="img is-block waypoint animation_right_d1">
				</picture>

				<span class="sun waypoint animation_scale_d2">
					<img src="<?=IMG?>icons/sun.svg" alt="" class="spin">
				</span>

			</div>
		</div>

		
	</div>
</section>













<section class="section-block-2 pt40" id="detalhes-tec">
 		
	<div class="columns is-mobile is-multiline all-contents ">
		<div class="column is-5-widescreen is-5-desktop is-12-tablet is-12-mobile pr40-tablet
		pl50-mobile pr50-mobile is-order-2-mobile">
			
			<div class="slide-galeria owl-carousel owl-theme waypoint animation_left">
				<div class="item">
					<a href="<?=IMG?>slide-conceito/1-lg.webp" data-fancybox="gal" data-caption="Fachada">
						<img class="is-block" src="<?=IMG?>slide-conceito/1-tb.webp" alt="">
					</a>
				</div>

				<div class="item">
					<a href="<?=IMG?>slide-conceito/2-lg.webp" data-fancybox="gal" data-caption="Acesso Externo">
						<img class="is-block" src="<?=IMG?>slide-conceito/2-tb.webp" alt="">
					</a>
				</div>

				<div class="item">
					<a href="<?=IMG?>slide-conceito/3-lg.webp" data-fancybox="gal" data-caption="Hall">
						<img class="is-block" src="<?=IMG?>slide-conceito/3-tb.webp" alt="">
					</a>
				</div>

				<div class="item">
					<a href="<?=IMG?>slide-conceito/4-lg.webp" data-fancybox="gal" data-caption="Região">
						<img class="is-block" src="<?=IMG?>slide-conceito/4-tb.webp" alt="">
					</a>
				</div>
				<div class="item">
					<a href="<?=IMG?>slide-conceito/5-lg.webp" data-fancybox="gal" data-caption="Fachada">
						<img class="is-block" src="<?=IMG?>slide-conceito/5-tb.webp" alt="">
					</a>
				</div>
			</div>

		</div>


		<div class="column is-narrow-fullhd is-3-widescreen is-3-desktop is-6-tablet
		is-5-mobile mt130  mt50-tablet  mt20-mobile pl0-mobile   is-order-0-mobile"
        >
			<img src="<?=IMG?>fachada-plaza-beach.webp" alt="fachada" class="img waypoint animation_bottom_d1">
		</div>


		<div class="column is-3-fullhd is-4-widescreen is-6-tablet is-7-mobile
		 font-secondary mt130    mt50-tablet pl40-tablet  mt20-mobile pl20-mobile is-order-1-mobile">
			<p class="ml20 ml10-mobile waypoint animation_right">74 METROS DE ALTURA</p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">25 PAVIMENTOS</p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">LAZER COM MAIS DE 800 M<sup>2</sup></p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">3 APARTAMENTOS POR ANDAR</p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">
                3 SUÍTES OU <br>
                2 SUÍTES E 2 DEMI-SUÍTES

            </p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">59 APARTAMENTOS</p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">3 ELEVADORES</p>
			<hr class=" waypoint animation_scale">

			<p class="ml20 ml10-mobile waypoint animation_right">SALA COMERCIAL</p>
			<hr class=" waypoint animation_scale">

			<a href="<?=LINK_WHATSAPP?>" target="_blank" class="btn padding-top:29px_windows mt70 mt30-tablet mt10-mobile waypoint animation_right"><span>FALE CONOSCO</span></a>
			
		</div>
	</div>

</section>














<section class="section-lazer pt40 pt20-mobile pb50-mobile" id="lazer">

	<div class="wrap">

		<div class="columns is-mobile is-multiline">
			<div class="column is-5-widescreen is-5-desktop is-4-tablet is-7-mobile pr0-mobile">
				<h2 class="mt10 mt0-mobile mb0-mobile waypoint animation_right has-text-right-mobile">LAZER</h2>
			</div>


			<div class="column is-4-widescreen is-4-desktop is-5-tablet is-hidden-mobile">
				<h3 class="waypoint animation_right_d1">
					EXPERIMENTE O<br>
					LAZER TODOS OS<br>
					DIAS, SEM RESERVAS.
				</h3>
			</div>


			<div class="column is-5 is-hidden-tablet">
				<h5 class="bg-secondary color-white is-inline-block pavimento
				mt15 padding-top:15px_windows padding-bottom:6px_windows_mobile padding-top:10px_windows_mobile mt10-mobile pl20 pr20 has-text-centered">
                    4º PAVIMENTO
                </h5>
			</div>


			<div class="column is-3-tablet is-12-mobile has-text-right has-text-centered-mobile waypoint animation_right_d2">
				<h5 class="bg-secondary color-white is-inline-block mb10 padding-top:15px_windows pl40 pr40
				 pl30-tablet pr30-tablet has-text-centered is-hidden-mobile">
					4º PAVIMENTO
				</h5>

				<h4>806,51 M²</h4>
			</div>
		</div>

	</div>




	<div class="wrap wide mt20 mt5-mobile">

		<div class="columns is-mobile is-multiline">
			<div class="column is-8-widescreen is-7-desktop is-12-tablet is-12-mobile pb0-mobile">
				<picture>
					<source srcset="<?=IMG?>planta-lazer.webp" media="(max-width: 578px)">
					<source srcset="<?=IMG?>planta-lazer.webp" media="(min-width: 579px)">
					<img src="<?=IMG?>planta-lazer.webp" alt="" class="is-block waypoint animation_left">
				</picture>

				<div class="has-text-right is-hidden-tablet bt-show-itens-lazer">
					<img src="<?=IMG?>icons/zoom.svg" alt="" class="mt15 waypoint animation_left">
				</div>
			</div>


			<div class="column is-4-widescreen is-5-desktop is-12-tablet is-12-mobile mt70 mt20-tablet pl30 pl15-mobile box-itens-lazer">

				<h6 class="bg-primary color-white is-inline-block padding-top:15px_windows
				 pb5-mobile has-text-centered waypoint animation_right ios-fix"
                >
                    PLAZA BEACH
                </h6>

				<div class="columns is-mobile mt20 mb0-mobile">
					<div class="column is-6 pb0-mobile waypoint animation_right">

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">1</p></div></div>
							<div class="column pl5-notebook">DECK PISCINA - 31,65 M²</div>
						</div>

						<div class="columns is-mobile  itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">2</p></div></div>
							<div class="column">PISCINA INFANTIL - 16,79 M²</div>
						</div>

					</div>

					<div class="column is-6 pb0-mobile waypoint animation_right_d2">
						
						<div class="columns is-mobile  itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">3</p></div></div>
							<div class="column pl5-notebook">PISCINA ADULTO - 72,67 M²</div>
						</div>

						<div class="columns is-mobile  itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">4</p></div></div>
							<div class="column pl5-notebook">LOUNGE EXTERNO - 122,49 M²</div>
						</div>

					</div>
				</div>









				<div class="columns is-mobile mt20 mt0-mobile">
					<div class="column is-6 waypoint animation_right">

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">5</p></div></div>
							<div class="column">SALÃO GOURMET - 54,29 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">6</p></div></div>
							<div class="column">JOGOS - 42,25 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">7</p></div></div>
							<div class="column">ESPAÇO BEAUTY - 15,93 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">8</p></div></div>
							<div class="column">ACADEMIA - 63,46 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">9</p></div></div>
							<div class="column">SAUNA SECA - 4,79 M²</div>
						</div>

					</div>
					
					<div class="column is-6 waypoint animation_right_d2">
						
						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">10</p></div></div>
							<div class="column">PISCINA AQUECIDA - 41,53 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">11</p></div></div>
							<div class="column">BRINQUEDOTECA - 15,48 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">12</p></div></div>
							<div class="column">SALÃO DE FESTAS - 59,60 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">13</p></div></div>
							<div class="column">APOIO PISCINA - 10,41 M²</div>
						</div>

					</div>
				</div>






				<h6 class="bg-primary padding-top:15px_windows color-white is-inline-block mt40 ios-fix mt10-mobile pb5-mobile has-text-centered waypoint animation_right">
                    PLAZA GARDEN
                </h6>

				<div class="columns is-mobile mt20">
					<div class="column is-6 waypoint animation_right">

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">14</p></div></div>
							<div class="column">PLAYGROUND - 35,44 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">15</p></div></div>
							<div class="column">FIREPLACE - 13,35 M²</div>
						</div>

					</div>

					<div class="column is-6 waypoint animation_right_d2">
						
						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">16</p></div></div>
							<div class="column">PRAÇA - 142,54 M²</div>
						</div>

						<div class="columns is-mobile itens mb0">
							<div class="column is-narrow pr0"><div class="num"><p class="top:57%_windows">17</p></div></div>
							<div class="column">ESPAÇO FITNESS - 38,37 M²</div>
						</div>

					</div>
				</div>


			</div>


			

		</div>






		<div class="columns is-mobile is-vcentered is-hidden-tablet">
			<div class="column is-5 has-text-centered">
				<img src="<?=IMG?>icons/meia-lua.svg" alt="" class="mt5 waypoint animation_left">
			</div>

			<div class="column is-7 pl0 pr0">
				<h3 class="mb0 waypoint animation_right_d1">
					EXPERIMENTE O<br>
					LAZER TODOS OS<br>
					DIAS, SEM RESERVAS.
				</h3>
			</div>
		</div>



	</div>

</section>















<section class="section-galeria pt10 pb30 pl70 pr70  pl60-tablet pr60-tablet   pl0-mobile pr0-mobile">
	<div class="columns is-mobile is-multiline is-variable is-1-mobile" style="<?= !$MOBILE ? 'margin: 0 auto; max-width: 1920px;' : ''; ?>">
		
		<?php foreach ($qGaleria1 as $rs) { $IMG_WEBP = altera_ext_webp(HTTP_UPLOADS_IMG."tb-".$rs->arquivo); ?>
		
            <div class="column is-4-tablet is-6-mobile item  pb0-mobile pt10-mobile  waypoint animation_bottom">
                <a class="fancybox" data-fancybox="gallery" data-caption='<?=($rs->legenda?$rs->legenda:EMPRESA); ?>'  href="<?=HTTP_UPLOADS_IMG.'lg-'.$rs->arquivo; ?>" title="<?=($rs->legenda?$rs->legenda:EMPRESA); ?>">

                    <div class="overlay"></div>
                    <div class="legenda is-uppercase font-secondary is-hidden-mobile"><?=$rs->legenda?></div>

                    <picture>
                        <source srcset="<?=$IMG_WEBP?>" type="image/webp">
                        <source srcset="<?=HTTP_UPLOADS_IMG.'tb-'.$rs->arquivo;?>" type="image/jpeg">
                        <img class="is-block" src="<?=$IMG_WEBP?>" alt="<?=($rs->legenda?$rs->legenda:EMPRESA); ?>">
                    </picture>
                </a>
            </div>

		<?php } ?>

	</div>
</section>













<section class="section-plaza is-relative pb0" id="plaza-beach" >

	<picture>
		<source srcset="<?=IMG?>bg-piscina-mobile.webp" media="(max-width: 578px)">
		<source srcset="<?=IMG?>bg-piscina.webp" media="(min-width: 579px)">
		<img src="<?=IMG?>bg-piscina.webp" alt="" class="is-block js-parallax-z main-img" data-zoom="15">
	</picture>

	<div class="txt font-secondary has-text-centered pl60-mobile pr60-mobile  waypoint animation_bottom">
		<div class="js-parallax" data-start="0" data-end="100">O VERDADEIRO LUXO ESTÁ NA SIMPLICIDADE DE UM MERGULHO SEM PRESSA</div>
	</div>







	





	<div class="bg-texture is-relative">
		<div class="wrap is-relative z-index-1">

			<div class="columns is-multiline is-mobile mt0-mobile is-align-items-flex-end">
				<div class="column is-4-tablet is-12-mobile waypoint animation_left pb0-mobile pr5 pl10-mobile pr10-mobile">
					<div class="box-p bg-ll-gray pt60 pl70 pr60  pt40-tablet pl40-tablet pr40-tablet pl60-mobile ">
						<img src="<?=IMG?>plaza-beach.svg" alt="logo" class="svg ml10">

						<p class="mt30 has-text-weight-light pl20 pr20">
							O Plaza Beach é onde o horizonte do mar encontra o conforto absoluto. Uma extensão dos apartamentos destinada ao lazer e ao descanso, composta por ambientes com uma bela vista para o mar, que podem ser acessados sem reserva.
						</p>

						<a href="<?=LINK_WHATSAPP?>" class="btn padding-top:29px_windows is-big-mob mt30 mb50"><span>FALE CONOSCO</span></a>
					</div>
				</div>


				<div class="column is-8-tablet is-12-mobile waypoint animation_right_d2 pl20 pl30-tablet pl10-mobile pr10-mobile pt0-mobile  mt0-mobile">
					<div class="slide-plaza-beach owl-carousel owl-theme">
						<?php for ($i=1; $i < 5; $i++) { ?>

						<div class="item">
							<a href="<?=IMG?>plaza-beach/0<?=$i?>-lg.webp" class="fancybox" data-fancybox="gallery-2">
								<img class="is-block" src="<?=IMG?>plaza-beach/0<?=$i?>.webp" alt="">
							</a>
						</div>

						<?php } ?>
					</div>
				</div>
			</div>






			<div class="columns is-multiline is-mobile mt50 mt20-mobile">
				<div class="column is-8-tablet is-12-mobile waypoint animation_right_d2 pr20 pl10-mobile pr10-mobile is-order-1-mobile pt0-mobile">
					<div class="slide-plaza-beach owl-carousel owl-theme">
						<?php for ($i=1; $i < 5; $i++) { ?>
							
						<div class="item">
							<a href="<?=IMG?>plaza-garden/0<?=$i?>-lg.webp" class="fancybox" data-fancybox="gallery-3">
								<img class="is-block" src="<?=IMG?>plaza-garden/0<?=$i?>.webp" alt="">
							</a>
						</div>
						
						<?php } ?>
					</div>
				</div>


				<div class="column is-4-tablet is-12-mobile waypoint animation_left is-order-0-mobile pl5 pl10-mobile pr10-mobile pb0-mobile" id="plaza-garden">
					<div class="box-p bg-ll-gray mt0 pt60 pl70 pr60  pt40-tablet pl40-tablet pr40-tablet  pl60-mobile">
						<img src="<?=IMG?>plaza-garden.svg" alt="logo" class="ml10 svg">

						<p class="mt30 has-text-weight-light pl20 pr20">
							No Plaza Garden, a natureza se revela em um cenário onde o verde contorna suavemente cada curva. Esta praça particular é projetada com um paisagismo envolvente, com ambientes que reforçam a conexão com a natureza, trazendo harmonia e frescor para o dia a dia. 
						</p>

						<a href="<?=LINK_WHATSAPP?>" class="btn padding-top:29px_windows is-big-mob mt30 mb50"><span>FALE CONOSCO</span></a>
					</div>
				</div>
			</div>

		</div>



		<picture class="is-relative z-index-0">
			<source srcset="<?=IMG?>bg-area-mobile.webp" media="(max-width: 578px)">
			<source srcset="<?=IMG?>bg-area.webp" media="(min-width: 579px)">
			<img src="<?=IMG?>bg-area.webp" alt="" class="is-block js-parallax" data-start="-145" data-end="50">
		</picture>


	</div>

</section>
















<section class="section-plantas bg-l-gray " id="plantas" style="<?=$MOBILE ? 'padding-bottom: 110px;' : '';?>">
	<div class="wrap wide pl10-mobile pr10-mobile">

		<div class="columns is-centered is-mobile">
			<div class="column is-one-fifth-tablet is-2-mobile pl0 pr0 pr0-mobile"><hr class="is-full mt40 mt30-tablet mt25-mobile waypoint animation_scale_d1"></div>
			<div class="column is-4-tablet is-8-mobile">
				<h2 class="is-big has-text-centered mb0-mobile waypoint animation_bottom">APARTAMENTOS</h2>
			</div>
			<div class="column is-one-fifth-tablet is-2-mobile pl0 pr0 pl0-mobile"><hr class="is-full mt40 mt30-tablet mt25-mobile waypoint animation_scale_d1"></div>
		</div>

		



		<div class="columns is-centered is-mobile mb0-mobile">
			<div class="column is-9-tablet is-12-mobile">
				<div class="plantas-nav is-flex is-justify-content-space-between mt20 mt10-mobile is-relative waypoint animation_bottom" id="plantas-nav">
					<a class="padding-top:12px_windows" ><span>TIPO 1</span></a>
					<a class="padding-top:12px_windows" ><span>TIPO 2</span></a>
					<a class="padding-top:12px_windows" ><span>TIPO 3</span></a>
					<a class="padding-top:12px_windows" ><span>COBERTURA 1</span></a>
					<a class="padding-top:12px_windows" ><span>COBERTURA 2</span></a>
				</div>
			</div>
		</div>


		<!-- <a href="<?=IMG?>plantas/01.webp" data-fancybox="planta" data-caption="Tipo 1">
			<picture>
				<source srcset="<?=IMG?>plantas/01-mobile.webp" media="(max-width: 578px)">
				<source srcset="<?=IMG?>plantas/01.webp" media="(min-width: 579px)">
				<img src="<?=IMG?>plantas/01.webp" alt="planta">
			</picture>
		</a> -->




		<div 
			class="plantas-slide cycle-slideshow waypoint animation_bottom mt70 mt50-tablet mt0-mobile" 
			data-cycle-slides=".li" 
			data-cycle-timeout="0" 
			data-cycle-log="false" 
			data-cycle-pager="#plantas-nav"
			data-cycle-pause-on-hover="true"
    		data-cycle-pager-template=""
			data-cycle-reverse="true"
			data-cycle-starting-slide="0"
    	>


			<div class="li">
				<div class="box-img has-text-centered">
					<picture>
						<source srcset="<?=IMG?>plantas/01-mobile.webp" media="(max-width: 578px)">
						<source srcset="<?=IMG?>plantas/01.webp" media="(min-width: 579px)">
						<img src="<?=IMG?>plantas/01.webp" alt="planta">
					</picture>
				</div>
			</div>

			
			<div class="li">
				<div class="box-img has-text-centered">
					<picture>
						<source srcset="<?=IMG?>plantas/02-mobile.webp" media="(max-width: 578px)">
						<source srcset="<?=IMG?>plantas/02.webp" media="(min-width: 579px)">
						<img src="<?=IMG?>plantas/02.webp" alt="planta">
					</picture>
				</div>
			</div>

			<div class="li">
				<div class="box-img has-text-centered">
					<picture>
						<source srcset="<?=IMG?>plantas/03-mobile.webp" media="(max-width: 578px)">
						<source srcset="<?=IMG?>plantas/03.webp" media="(min-width: 579px)">
						<img src="<?=IMG?>plantas/03.webp" alt="planta">
					</picture>
				</div>
			</div>


			<div class="li">
				<div class="box-img has-text-centered">
					<picture>
						<source srcset="<?=IMG?>plantas/04-mobile.webp" media="(max-width: 578px)">
						<source srcset="<?=IMG?>plantas/04.webp" media="(min-width: 579px)">
						<img src="<?=IMG?>plantas/04.webp" alt="planta">
					</picture>
				</div>
			</div>


			<div class="li">
				<div class="box-img has-text-centered">
					<picture>
						<source srcset="<?=IMG?>plantas/05-mobile.webp" media="(max-width: 578px)">
						<source srcset="<?=IMG?>plantas/05.webp" media="(min-width: 579px)">
						<img src="<?=IMG?>plantas/05.webp" alt="planta">
					</picture>
				</div>
			</div>

		</div>


	</div>
</section>













<section class="section-galeria bg-l-gray pt10 pl70 pr70  pl0-mobile pr0-mobile">
	<div class="columns is-mobile is-multiline is-variable is-1-mobile" style="<?= !$MOBILE ? 'margin: 0 auto; max-width: 1920px;' : ''; ?>">
		
		<?php foreach ($qGaleria2 as $rs) { $IMG_WEBP = altera_ext_webp(HTTP_UPLOADS_IMG."tb-".$rs->arquivo); ?>
		
		<div class="column is-4-tablet is-6-mobile pb0-mobile pt10-mobile item waypoint animation_bottom">
			<a class="fancybox" data-fancybox="gallery-4" data-caption='<?=($rs->legenda?$rs->legenda:EMPRESA); ?>'  href="<?=HTTP_UPLOADS_IMG.'lg-'.$rs->arquivo; ?>" title="<?=($rs->legenda?$rs->legenda:EMPRESA); ?>">

				<div class="overlay"></div>
				<div class="legenda is-uppercase font-secondary is-hidden-mobile"><?=$rs->legenda?></div>

				<picture>
					<source srcset="<?=$IMG_WEBP?>" type="image/webp">
					<source srcset="<?=HTTP_UPLOADS_IMG.'tb-'.$rs->arquivo;?>" type="image/jpeg">
					<img class="is-block" src="<?=$IMG_WEBP?>" alt="<?=($rs->legenda?$rs->legenda:EMPRESA); ?>">
				</picture>
			</a>
		</div>

		<?php } ?>

	</div>
</section>












<section class="section-diferenciais bg-l-gray pt30 pb40-mobile" id="diferenciais">
	<div class="wrap pl0-mobile pr0-mobile">

		<div class="columns is-mobile">
			<div class="column is-4-tablet is-2-mobile pr20 pr0-mobile"><hr class="is-full mt40 mt30-tablet mt25-mobile waypoint animation_scale_d1"></div>
			<div class="column is-4-tablet is-8-mobile">
				<h2 class="is-big has-text-centered mb0-mobile waypoint animation_bottom">DIFERENCIAIS</h2>
			</div>
			<div class="column is-4-tablet is-2-mobile pl20 pl0-mobile"><hr class="is-full mt40 mt30-tablet mt25-mobile waypoint animation_scale_d1"></div>
		</div>




		<?php

		$aDif_1 = [
			['hall-entrada.svg', 'Hall de entrada com pé-direito duplo'],
			['porte-cochere.svg', 'Porte-cochère'],
			['entrada-banhistas.svg', 'Entrada exclusiva para banhistas'],
			['reconhecimento-facial.svg', 'Controle de entrada e saída por reconhecimento facial nas áreas comuns'],
			['automacao-iluminacao.svg', 'Automação de iluminação, áudio, vídeo e climatização nas áreas comuns'],

			['projeto-paisagistico.svg', 'Projeto paisagístico'],
			['bar-piscina.svg', 'Bar de apoio na piscina'],
			['hobby-box.svg', 'Hobby box'],
			['gerador.svg', 'Gerador de energia'],
			['piscina-coberta-aquecida.svg', 'Piscina coberta aquecida'],

			['espreguicadeiras.svg', 'Terraço da piscina com espreguiçadeiras'],
			['maquina-gelo.svg', 'Máquina de gelo'],
			['sala-funcionarios.svg', 'Sala equipada para funcionários'],
			['wi-fi.svg', 'Ambientes sociais com wi-fi'],
			['areas-decoradas.svg', 'Áreas comuns entregues decoradas e equipadas'],

			['bicicletario.svg', 'Bicicletário'],
			['sauna.svg', 'Sauna'],
			['pintura-epoxi.svg', 'Garagens com pintura em epóxi'],
			['elevadores.svg', '3 elevadores, sendo 2 sociais e 1 de serviço'],
			['irrigacao.svg', 'Jardins com irrigação automática'],
		];


		$aDif_2 = [
			['medidores.svg', 'Medidores individuais de água, gás e energia'],
			['tomada-usb.svg', 'Tomadas USB nas suítes e living'],
			['banheiro.svg', 'Banheiro da suíte master com infraestrutura para 2 cubas'],
			['aquecedor.svg', 'Infraestrutura para aquecedor e sistema de recirculação de água quente'],
			['exaustao.svg', 'Área de serviço com exaustão para máquina de secar'],

			['piso.svg', 'Piso vinílico nas suítes'],
			['nicho.svg', 'Banheiro com nicho embutido'],
			['persianas.svg', 'Suítes com persianas motorizadas integradas'],
			['churrasqueira.svg', 'Churrasqueira a carvão com sistema de exaustão por dumper'],
			['fechaduras.svg', 'Fechaduras biométricas nos apartamentos'],
		];


		$aDif_3 = [
			['guarita.svg', 'Guarita totalmente equipada'],
			['reconhecimento-facial.svg', 'Controle de entrada e saída por reconhecimento facial nas áreas comuns'],
			['camera.svg', 'Sistema de monitoramento por câmeras'],
			['delivery.svg', 'Delivery: Espaço específico para entrega de encomendas'],
			['tag.svg', 'Dispositivo eletrônico de controle de acesso à piscina'],

			['lixeira.svg', 'Lixeiras na garagem térrea com acesso interno'], 
			['botao.svg', 'Botão de emergência para o desligamento da bomba da piscina do lazer'],
		];


		$aDif_4 = [
			['lixeira-eco.svg', 'Depósito de resíduos comum e reciclável com lixeiras exclusivas para coleta seletiva'],
			['agua-chuva.svg', 'Captação de água pluvial com tanque de retardo e aproveitamento da água da chuva'],
			['sensores.svg', 'Sensores de presença para iluminação em áreas de circulação'],
			['carro-eletrico.svg', '1 ponto por apartamento para carregamento de carro elétrico'],
			['carregador-bike.svg', 'Ponto de carregamento para bicicletas e patinetes'],

			['lamapada-led.svg', 'Iluminação full led'], 
			['energia-solar.svg', 'Energia solar fotovoltaica']
		];

		?>


		<div class="container-itens mt10 pl30-mobile pr30-mobile">

			<div class="serv-list mb20 mb10-mobile waypoint animation_bottom">
				<div class="bt-expand is-clickable font-secondary">
					<span>EMPREENDIMENTO</span> <i class="icone fa fa-chevron-down"></i> 
				</div>

				<div class="content">

					<div class="columns is-mobile is-multiline mt10 mt0-mobile has-text-centered">
						<?php foreach($aDif_1 as $rs){ ?>
						<div class="column is-one-fifth-tablet is-6-mobile">
							<div class="box_i">
								<div class="box_img is-flex is-justify-content-center is-align-items-flex-end">
									<img class="ico" src="<?=IMG?>dif/<?=$rs[0]?>" alt="icone">
								</div>
								<?=$rs[1]?>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>
			</div>




			<div class="serv-list mb20 mb10-mobile waypoint animation_bottom">
				<div class="bt-expand is-clickable font-secondary">
					<span>APARTAMENTO</span> <i class="icone fa fa-chevron-down"></i> 
				</div>

				<div class="content"> 

					<div class="columns is-mobile is-multiline mt10 mt0-mobile has-text-centered">
						<?php foreach($aDif_2 as $rs){ ?>
						<div class="column is-one-fifth-tablet is-6-mobile">
							<div class="box_i">
								<div class="box_img is-flex is-justify-content-center is-align-items-flex-end">
									<img class="ico" src="<?=IMG?>dif/<?=$rs[0]?>" alt="icone">
								</div>
								<?=$rs[1]?>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>
			</div>




			<div class="serv-list mb20 mb10-mobile waypoint animation_bottom">
				<div class="bt-expand is-clickable font-secondary">
					<span>SEGURANÇA</span> <i class="icone fa fa-chevron-down"></i> 
				</div>

				<div class="content"> 

					<div class="columns is-mobile is-multiline mt10 mt0-mobile has-text-centered">
						<?php foreach($aDif_3 as $rs){ ?>
						<div class="column is-one-fifth-tablet is-6-mobile">
							<div class="box_i">
								<div class="box_img is-flex is-justify-content-center is-align-items-flex-end">
									<img class="ico" src="<?=IMG?>dif/<?=$rs[0]?>" alt="icone">
								</div>
								<?=$rs[1]?>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>
			</div>




			<div class="serv-list mb20 mb10-mobile waypoint animation_bottom">
				<div class="bt-expand is-clickable font-secondary">
					<span>SUSTENTABILIDADE</span> <i class="icone fa fa-chevron-down"></i> 
				</div>

				<div class="content"> 

					<div class="columns is-mobile is-multiline mt10 mt0-mobile has-text-centered">
						<?php foreach($aDif_4 as $rs){ ?>
						<div class="column is-one-fifth-tablet is-6-mobile">
							<div class="box_i">
								<div class="box_img is-flex is-justify-content-center is-align-items-flex-end">
									<img class="ico" src="<?=IMG?>dif/<?=$rs[0]?>" alt="icone">
								</div>
								<?=$rs[1]?>
							</div>
						</div>
						<?php } ?>
					</div>

				</div>
			</div>



		</div>

	</div>
</section>









<section class="section-localizacao bg-ll-gray" id="localizacao">
	<div class="wrap">


		<div class="columns">
			<div class="column is-5">
				<h2 class="font-secondary has-text-weight-light xmb10 waypoint animation_right">BARRA VELHA/SC</h2>

				<h3 class="font-secondary waypoint animation_right">
					UMA BELA PAISAGEM<br>
					COM MUITO POTENCIAL<br>
					DE VALORIZAÇÃO.
				</h3>

				<hr class="mt40 mt30-mobile waypoint animation_scale">

				<p class="mt40 pr100  mt30-mobile pr20-mobile waypoint animation_right">
					Com diversas praias e belezas naturais, a cidade vem ganhando destaque e uma grande valorização de preço do metro quadrado, com diversos lançamentos imobiliários e também com uma melhoria significativa das opções de lazer e gastronomia.
				</p>
			</div>


			<div class="column is-1"></div>


			<div class="column is-6 mt10">

				<img src="<?=IMG?>barra-velha.webp" alt="barra velha" class="waypoint animation_right_d2">


				<p class="mt30 has-text-weight-bold waypoint animation_right_d2">DISTÂNCIAS</p>

				<div class="columns is-mobile is-multiline mt0 waypoint animation_right_d2 proximidades">

					<div class="column is-4-tablet is-7-mobile pb0-mobile">
						<div class="item">
							<strong>40 km</strong>
							<span class="ml10">Itajaí</span>
						</div>

						<div class="item">
							<strong>48 km</strong>
							<span class="ml10">Joinville</span>
						</div>

						<div class="item">
							<strong>51 km</strong>
							<span class="ml10">Balneário Camboriú</span>
						</div>

						<div class="item">
							<strong>59 km</strong>
							<span class="ml10">Jaraguá do Sul</span>
						</div>
					</div>


					<div class="column is-4-tablet is-7-mobile pt0-mobile pb0-mobile">
						<div class="item">
							<strong>69 km</strong>
							<span class="ml15">Brusque</span>
						</div>

						<div class="item">
							<strong>70 km</strong>
							<span class="ml15">Blumenau</span>
						</div>

						<div class="item">
							<strong>122 km</strong>
							<span class="ml10">São Bento do Sul</span>
						</div>
					</div>


					<div class="column is-4-tablet is-7-mobile pt0-mobile">
						<div class="item">
							<strong>135 km</strong>
							<span class="ml10">Florianópolis</span>
						</div>

						<div class="item">
							<strong>173 km</strong>
							<span class="ml10">Curitiba / PR</span>
						</div>

						<div class="item">
							<strong>570 km</strong>
							<span class="ml10">Porto Alegre / RS</span>
						</div>
					</div>
					
				</div>



			</div>
		</div>


		

		<div class="map-container mt60 mt40-mobile waypoint animation_bottom">
			<div class="map-iframe">

				<iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1498.9557754346263!2d-48.69054526465116!3d-26.67607669772837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d92b00327a141b%3A0x34b16296203678da!2sPlaza%20BEACH%20-%20Campos%20Incorporadora!5e0!3m2!1spt-BR!2sbr!4v1739912263756!5m2!1spt-BR!2sbr" width="100%" height="440" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

			</div>
		</div>

		<div class="has-text-centered mt20 waypoint animation_bottom">
			<p class="mt25 address font-secondary has-text-weight-bold"><i class="fa fa-map-marker color-secondary"></i> RUA ROSA DOS VENTOS, 42 - ITAJUBÁ - BARRA VELHA / SC</p>
		</div>

		
						
	</div>
</section>







<picture >
	<source srcset="<?=IMG?>banner-barra-velha-mobile.webp" media="(max-width: 578px)">
	<source srcset="<?=IMG?>banner-barra-velha.webp" media="(min-width: 579px)">
	<img src="<?=IMG?>banner-barra-velha.webp" alt="" class="is-block" style="<?= !$MOBILE ? 'margin: 0 auto; max-width: 1920px;' : ''; ?>">
</picture>







<section class="section-home-contato bg-l-gray is-relative pb60 pb20-mobile pt20-mobile" id="contato">
	<div class="wrap pl0-mobile pr0-mobile">


		<div class="box-form bg-ll-gray mt40 pb60 mt0-mobile pl60-mobile pr60-mobile pb0-mobile">

			<div class="columns is-mobile is-multiline is-centered">


				<div class="column is-3-tablet is-12-mobile mt90 pl10 pr40 pl40-mobile">
					<img src="<?=IMG?>plaza-beach-residence-form.svg" alt="logo" class="waypoint animation_right">

					<p class="mt20 has-text-weight-light waypoint animation_right_d1 has-text-centered-mobile">
						Preencha o formulário e nossos consultores entrarão em contato<br class="is-hidden-mobile">
						para fornecer mais detalhes.
					</p>
				</div>



				<div class="column is-3 is-hidden-mobile is-relative">
					<img src="<?=IMG?>form-pessoa.webp" alt="logo" class="pessoa waypoint animation_right_dd1">
				</div>


				<div class="column is-4-tablet is-12-mobile waypoint animation_right_dd2 mt90 pl60 pr0 mt30-mobile pl10-mobile pr10-mobile">

					<form id="form-contato" action="" method="post">

						<div class="columns is-mobile is-multiline">
							<div class="column is-12 pb5">
								<input type="text" name="nome" class="input" placeholder="Nome" required />
							</div>
							<div class="column is-12 pb5">
								<input type="email" name="email" class="input" placeholder="E-Mail" required />
							</div>
							<div class="column is-12 pb5">
								<input type="text" name="telefone" class="input telefone" placeholder="WhatsApp" required />
							</div>

							<!-- <div class="column is-12">
								<textarea name="mensagem" rows="3" placeholder="Mensagem"></textarea>
							</div> -->

							<!-- <div class="column is-12 pt0">
								<small>Ao enviar meus dados confirmo ciência sobre a <a href="<?=HTTP?>politica-de-privacidade/" class="color-primary">política de privacidade.</a></small>
							</div> -->

							<div class="column is-12 has-text-right">
								<button class="btn is-small padding-top:12px_windows is-rounded button mt10 mb0" type="submit" name="submit"><span>ENVIAR</span></button>
							</div>
						</div>

					</form>


				</div>
			</div>


			<img src="<?=IMG?>form-pessoa.webp" alt="logo" class="mt40 is-block is-hidden-tablet waypoint animation_right_dd1">
		
		</div>









		<div class="columns is-mobile is-multiline mt100 pl40-mobile pr40-mobile mt60-mobile">

			<div class="column is-6-tablet is-12-mobile pr70 pr10-tablet pr10-mobile has-text-centered-mobile">

				<div class="pl40-mobile pr40-mobile">
					<a href="https://www.camposincorporadora.com.br/" target="_blank" title="Campos Construtora">
						<img src="<?=IMG?>logo-campos-construtora-dark.svg" alt="logo" class="campos waypoint animation_right"  style="max-width: 365px; width: 100%;">
					</a>

					<h3 class="mt50 mt40-mobile waypoint animation_right">
						A EXPERIÊNCIA DE ANOS DÁ ORIGEM A UM NOVO MOMENTO.
					</h3>
				</div>

				<p class="mt25 has-text-weight-light waypoint animation_left">
					Uma construção precisa ir além do que se vê. Ela existe para aprimorar a maneira como as pessoas vivem e se relacionam com a cidade. Nós, da Campos Incorporadora, trazemos esse pensamento em tudo o que fazemos.
					<br><br>
					Desde 2012, desenvolvemos projetos de engenharia com excelência e rigor técnico. Nossa proposta é criar experiências inspiradoras por meio de espaços encantadores.
				</p>

				<hr class="mt40 mx-auto-mobile waypoint animation_scale" style="background: #aa9d8e">



				<div class="is-hidden-mobile">
					<h3 class="mt30 waypoint animation_right">CENTRAL DE VENDAS:</h3>

					<div class="columns waypoint animation_right_d2">
						<div class="column is-6">
							<p class="has-text-weight-light">
								<strong>Entre em contato:</strong>
								<br>
								(47) 99664-0375<br>
								<a href="mailto:vendas@camposincorporadora.com.br">vendas@camposincorporadora.com.br</a>
								<br>
								<STRONG>Registro de Incorporação: </STRONG>
								<br>R.6-43.610 do Ofício de Registro de Imóveis de Barra Velha/SC.
							</p>
						</div>

						<div class="column is-6">
							<p class="has-text-weight-light">
								<strong>Endereço:</strong>
								<br>
								R: João Pessoa, 860 - Bairro América<br>
								Segunda à Sexta, das 08h às 18h
							</p>
						</div>
					</div>
				</div>

			</div>





			<div class="column is-6-tablet is-12-mobile pl90 pl40-tablet pl10-mobile">

				<p class="has-text-centered waypoint animation_bottom">NOSSOS EMPREENDIMENTOS</p>


				<div class="columns is-mobile is-multiline is-variable is-2 emps mt10">
					<div class="column is-4 waypoint animation_right_dd1">
						<img src="<?=IMG?>emp-1.webp" alt="emp">

						<p class="mt5 ml20">
							PIAZZA<br>
							SAN MARCO<br>
							JOINVILLE/SC
						</p>
					</div>

					<div class="column is-4 waypoint animation_right_dd1">
						<img src="<?=IMG?>emp-2.webp" alt="emp">

						<p class="mt5 ml20">
							PIAZZA<br>
							SAN CARLO<br>
							JOINVILLE/SC
						</p>
					</div>

					<div class="column is-4 waypoint animation_right_dd1">
						<img src="<?=IMG?>emp-3.webp" alt="emp">

						<p class="mt5 ml20">
							PIAZZA<br>
							DELA LIBERTÁ<br>
							JOINVILLE/SC
						</p>
					</div>



					<div class="column is-4 waypoint animation_right_dd1">
						<img src="<?=IMG?>emp-4.webp" alt="emp">

						<p class="mt5 ml20">
							PIAZZA<br>
							SAN PIETRO<br>
							JOINVILLE/SC
						</p>
					</div>

					<div class="column is-4 waypoint animation_right_dd1">
						<img src="<?=IMG?>emp-5.webp" alt="emp" class="ml10">

						<p class="mt5 ml20">
							DEL MARE<br>
							BALNEÁRIO<br>
							PIÇARRAS/SC
						</p>
					</div>

					<div class="column is-4 waypoint animation_right_dd1">
						<img src="<?=IMG?>emp-6.webp" alt="emp">

						<p class="mt5 ml20">
							RESIDENCIAL<br>
							BOLSHOI BRASIL<br>
							JOINVILLE/SC
						</p>
					</div>

				</div>







				<div class="is-hidden-tablet has-text-centered">
					<h3 class="mt30 waypoint animation_right">CENTRAL DE VENDAS:</h3>

					<div class="mt20 waypoint animation_right_d2">
						<p class="has-text-weight-light">
							(47) 99138-2244<br>
							<a href="mailto:vendas@camposincorporadora.com.br">vendas@camposincorporadora.com.br</a><br>
							R: João Pessoa, 860 - Bairro América<br>
							Segunda à Sexta, das 08h às 18h
						</p>
					</div>
				</div>



				
			</div>

		</div>






	</div>
</section>







<?php get_footer(); ?>

<script>
	/* serve para remover a classe fancybox de um item a mais que o slide cria, 
		deixando o fancybox com o numero certo de slides
	*/
	/*
	jQuery(document).ready(function($)
	{
		setInterval(function() {
			let slide = $('.cycle-sentinel').find('a');
			slide.attr('data-fancybox', "");

			let slide_casas = $('.slide-casas .owl-item.cloned').find('a');
			slide_casas.attr('data-fancybox', "");
		}, 100);
	});*/
</script>