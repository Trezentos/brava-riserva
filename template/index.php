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
        'styles/css/swiper-bundle.min.css',
        'styles/css/owl.carousel.min.css',
        'styles/css/owl.theme.default.min.css',
        'styles/css/jquery.fancybox.min.css'
    ]);

    add_javascript([
        'swiper-bundle.min.js',
        'owl.carousel.min.js',
        'jquery.maskedinput.js',
        'jquery.cycle2.min.js',
        'jquery.fancybox.min.js',
        'ios.js',
        'video-config.js',
        'galeria-slide.js'
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

                            <?php if( $rs->link && $rs->texto_cta ){ ?>
                                <a href="<?=$rs->link; ?>" target="<?=($rs->destino_cta=="_self"?"":"_blank"); ?>"
                                   class="btn is-primary">
                        <span class="primary-font">
                            <?=$rs->texto_cta; ?>
                        </span>
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









<section class="section-intro bg-l-gray pt95 pb85 pb0-mobile waypoint animation_bottom_d1 animated is-relative" id="empreendimento">
    <div class="wrap mt0-mobile">

        <div class="columns is-mobile is-multiline">
            <div class="column is-6-widescreen is-5-desktop is-5-tablet is-12-mobile mt0-mobile pr0 pr10-mobile">

                <h2 class="waypoint animation_bottom mt45 mb45">
                    a Praia Brava<br>
                    pulsa e evolui
                </h2>

                <hr class="waypoint animation_scale">

                <p class="mt45 waypoint animation_bottom mt45">
                    E é neste cenário dinâmico que surge um projeto pensado para quem deseja respirar mais fundo.
                    <br>
                    Um lugar onde o verde não está apenas ao redor, <br>
                    mas dentro.
                    <br><br>
                    Brava Riserva é um refúgio que entrega a experiência de caminhar por um jardim em meio à cidade.
                    <br>
                    Um encontro entre o natural e o contemporâneo, entre o conforto e a simplicidade do ar livre.
                    <br><br>

                    Aqui, o tempo encontra outro ritmo. E cada detalhe foi pensado para que você encontre o seu.

                </p>

            </div>

            <!--			<div class="column is-1-widescreen is-narrow-desktop is-narrow-tablet pr0-tablet pr0-tablet is-hidden-mobile"></div>-->

            <div class="column is-6-widescreen is-7-desktop is-5-tablet is-12-mobile pl60 pl40-tablet pl0-mobile pb0-mobile mt50-mobile is-relative">

                <picture>
                    <source srcset="<?=IMG?>img-intro.webp" media="(max-width: 578px)">
                    <source srcset="<?=IMG?>img-intro.webp" media="(min-width: 579px)">
                    <img src="<?=IMG?>img-intro.webp" alt="" class="img is-block waypoint animation_right_d1">
                </picture>
            </div>
        </div>


    </div>


    <img src="<?=IMG.'folha-background.webp'?>" class="folha-background waypoint animation_bottom_d2" alt="">
</section>













<section class="section-block-2 bg-primary pt80" id="detalhes-tec">

    <div class="slide-content ">
        <div class="slide-item is-relative">
            <div class="slide-galeria owl-carousel owl-theme waypoint animation_left">


                <div class="item">
                    <a href="<?=IMG?>slide-conceito/1-lg.webp" data-fancybox="gal" data-caption="Fachada">
                        <img class="is-block" src="<?=IMG?>slide-conceito/1-tb.webp" alt="">
                    </a>
                </div>
            </div>
        </div>


        <div class="slide-description pl30-notebook pl60 pt40 pr40-notebook">
            <div>
                <h2>o empreendimento</h2>
                <hr>
                <p>
                    Cinco elevadores <br>
                    Circuito fechado de câmeras <br>
                    Hall de entrada com portaria automatizada <br>
                    Controle de acesso por reconhecimento facial <br>
                    Gerador para as áreas comuns e elevadores <br>
                    infraestrutura para abastecimento de carros elétricos <br>
                    Hobby box privativo nas garagens <br>
                    Bicicletário <br>
                    Home market <br>
                    Pet place <br>
                </p>

                <h2 class="medium mt65 mb35">
                    a natureza <br>
                    como arquitetura
                </h2>

                <p>
                    O Brava Riserva nasceu com um propósito: criar uma <br>
                    experiência de moradia onde a natureza não fosse <br>
                    apenas paisagem, mas protagonista.
                </p>
            </div>
        </div>
    </div>

</section>













<?php
$lazerList = [
    1  => ['nome' => 'Playground',               'link' => 'playground-brava-riserva.jpg'],
    2  => ['nome' => 'Espaço Kids',               'link' => 'espaco-kids-brava-riserva.jpg'],
    3  => ['nome' => 'Gourmet com private pool',  'link' => 'gourmet-com-private-pool-brava-riserva.jpg'],
    4  => ['nome' => 'Beauty Place',              'link' => 'beauty-place-brava-riserva.jpg'],
    5  => ['nome' => 'Sports Bar',                'link' => 'sports-bar-brava-riserva.jpg'],
    6  => ['nome' => 'Sala de Jogos',             'link' => 'sala-de-jogos-brava-riserva.jpg'],
    7  => ['nome' => 'Academia',                  'link' => 'academia-brava-riserva.jpg'],
    8  => ['nome' => 'Salão de Festas',           'link' => 'salao-de-festas-brava-riserva.jpg'],
    9  => ['nome' => 'Pomar',                     'link' => 'pomar-brava-riserva.jpg'],
    11 => ['nome' => 'Piscina adulto',            'link' => 'piscina-adulto-brava-riserva.jpg'],

    10 => ['nome' => 'Bar molhado',               'link' => 'bar-molhado-brava-riserva.jpg'],
    12 => ['nome' => 'Piscina infantil',          'link' => 'piscina-infantil-brava-riserva'],
    13 => ['nome' => 'Prainha',                   'link' => 'prainha-brava-riserva'],
    14 => ['nome' => 'Terraço',                   'link' => 'terraco-brava-riserva'],


];
?>

<section class="section-lazer pb125 pt50 pt20-mobile pb50-mobile" id="lazer">

    <div class="wrap">

        <div class="columns is-mobile is-multiline">
            <div class="column is-5-widescreen is-5-desktop is-4-tablet is-7-mobile pr0-mobile">
                <h2 class="mt10 big mt0-mobile mb0-mobile pl15 waypoint animation_right has-text-right-mobile">
                    o lazer
                </h2>
            </div>
        </div>

    </div>


    <div class="wrap mt30 mt5-mobile">

        <div class="columns is-mobile is-multiline">
            <div class="column is-9-widescreen is-7-desktop is-12-tablet is-12-mobile pb0-mobile">
                <figure class="is-relative">
                    <img src="<?=IMG.'folha-background-2.webp'?>" class="folha-background waypoint animation_left" alt="">
                    <picture class="planta-lazer">
                        <img src="<?=IMG?>planta-lazer.webp" alt="" class="is-block waypoint animation_left">
                    </picture>
                </figure>

                <div class="has-text-right is-hidden-tablet bt-show-itens-lazer">
                    <img src="<?=IMG?>icons/zoom.svg" alt="" class="mt15 waypoint animation_left">
                </div>
            </div>


            <div class="column is-3-widescreen lazer-block">

                <h3 class="bg-primary is-inline-block  pb5-mobile  waypoint animation_right ">
                    pavimento de lazer <br>
                    completo integrado <br>
                    com a natureza
                </h3>

                <div class="lazer-list ">
                    <ul>
                        <?php foreach ($lazerList as $i => $item): ?>
                            <li class="waypoint animation_right">
                                <span class="number"><?= $i ?></span>
                                <a
                                        href="<?= IMG . 'lazer-areas/' . $item['link']; ?>"
                                        data-fancybox="lazer-photos"
                                        data-caption="<?= $item['nome']; ?>"
                                >
                                    <p>
                                        <?= $item['nome']; ?>
                                    </p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="section-carousel carousel-1 pt0 pb0 is-relative pt80-mobile pb80-mobile pt100-notebook pb50-notebook pt100-tablet " id="galeria">
    <div class="wrap pl50-mobile pr50-mobile">
        <div class="swiper slide-imoveis swiper-imoveis pb150 mb0-tablet mt15-mobile mb10-mobile">
            <div class="swiper-wrapper">
                <?php foreach ($qGaleria1 as $card): ?>
                    <div class="swiper-slide" data-title="<?= $card->legenda; ?>">
                        <a
                                href="<?=  HTTP_UPLOADS_IMG.'lg-'.$card->arquivo; ?>"
                                data-fancybox="galeria-1"
                                data-caption="<?= $card->legenda; ?>"
                        >
                            <h2><?= $card->legenda; ?></h2>
                            <figure class="image-container">
                                <img
                                        src="<?= HTTP_UPLOADS_IMG.($MOBILE ? 'tb-' : 'md-').$card->arquivo; ?>"
                                        alt="<?= $card->legenda; ?>"
                                >
                            </figure>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-scrollbar"></div>
        </div>
    </div>
</section>


<section class="section-plaza is-relative pt0 pb0" id="plaza-beach" >

    <picture>
        <source srcset="<?=IMG?>bg-piscina-mobile.webp" media="(max-width: 578px)">
        <source srcset="<?=IMG?>bg-piscina.webp" media="(min-width: 579px)">
        <img src="<?=IMG?>bg-piscina.webp" alt="" class="is-block js-parallax-z main-img" data-zoom="15">
    </picture>

</section>

<section class="video  mb0 pb0 pt30">
    <div class="wrap pr0-mobile pl0-mobile ">
        <div class="container-video is-relative  ">

            <div class="placeholder-video ">
                <button id="play-button" class="btn is-white bt-play " title="Reproduzir vídeo" aria-label="Reproduzir vídeo">
                    <i class="fa fa-play"></i>
                </button>
            </div>
            <div class=" animation_top animated">
                <div class="video-container "  data-video="y5XuR2BWe0g"> </div>

                <!--    			<img src="--><?php //=IMG.'video-cover.webp'?><!--" class="" alt="">-->

                <div class="cover-img">
                    <picture>
                        <source media="(max-width: 768px)" srcset="<?=IMG.'cover-img.webp'?>">
                        <img src="<?=IMG.'cover-img.webp'?>" class="" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-plaza is-relative pt0 pb0 ">

    <div class="bg-texture is-relative">
        <div class="wrap is-relative z-index-1">

            <div class="columns is-multiline is-mobile mt0-mobile is-align-items-flex-end">

            </div>


            <div class="columns is-multiline is-mobile mt75 mt20-mobile">
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
                    <div class="box-p bg-ll-gray mt0 pt50 pl50 pr60 pb75 pt40-tablet pl40-tablet pr40-tablet  pl60-mobile">
                        <h2 class="medium">Ana Holzer</h2>

                        <h2 class="smaller">autora do pro<span>j</span>eto de paisagismo</h2>

                        <p class="mt30 has-text-weight-light">
                            “Quando iniciamos o projeto do <strong>Brava Riserva</strong>, tínhamos um desejo claro e profundo: que as pessoas experimentassem a natureza como parte essencial do seu dia a dia.
                            <br><br>
                            Neste sentido, o <strong>Brava Riserva</strong> pode ser descrito como um verdadeiro oásis natural.
                            <br><br>
                            Águas cristalinas que correm como riacho sereno, o calor do fogo acolhendo momentos de boas conversas, o ar puro da Brava permeando cada experiência, e a terra, generosa, abrigando jardins deslumbrantes de flores e frutos.
                            <br><br>
                            Assim é viver neste empreendimento, onde o conforto e a modernidade se encontram em perfeita harmonia com a exuberância do paisagismo.”
                        </p>
                    </div>

                    <img src="<?=IMG.'folha-background-vertical.webp'?>" class="folha-vertical" alt="">

                    <img src="<?=IMG.'ana-holzer-assinatura.webp'?>" class="ana-holzer-ass" alt="">
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













<?php
$plantas = [
    [
        'final' => 'final 1',
        'titulo' => 'apartamento final 1',

        'imagens' => [
            'desktop' => 'plantas/01.webp',
            'mobile'  => 'plantas/01-mobile.webp',
        ],

        'atributos' => [
            [
                'icone' => 'icons/metragem.webp',
                'valor' => '130m²',
            ],
            [
                'icone' => 'icons/cama.webp',
                'valor' => '3 suítes',
            ],
        ],

        'lista' => [
            'Churrasqueira a carvão',
            'Piso vinílico nas áreas íntimas',
            'Quartos com persianas embutidas',
            'Fechadura biométrica nas portas de entrada',
        ],

        'descricao' => [
            'Cada ambiente convida a sentir a calma e o frescor',
            'da Praia Brava dentro de casa.',
        ],
    ],

    // 🔹 SEGUNDA PLANTA (teste)
    [
        'final' => 'final 2',
        'titulo' => 'apartamento final 2',

        'imagens' => [
            'desktop' => 'plantas/02.webp',
            'mobile'  => 'plantas/02-mobile.webp',
        ],

        'atributos' => [
            [
                'icone' => 'icons/metragem.webp',
                'valor' => '145m²',
            ],
            [
                'icone' => 'icons/cama.webp',
                'valor' => '4 suítes',
            ],
        ],

        'lista' => [
            'Living integrado',
            'Sacada com churrasqueira',
            'Piso porcelanato nas áreas sociais',
            'Fechadura eletrônica',
        ],

        'descricao' => [
            'Espaços amplos que valorizam conforto e sofisticação',
            'em cada detalhe do projeto.',
        ],
    ],
];
?>


<?php
$plantas = [
    [
        'imagem_desktop' => 'plantas/01.webp',
        'titulo' => 'apartamento final 1',
        'metragem' => '130m²',
        'suites' => '3 suítes',
    ],
    [
        'imagem_desktop' => 'plantas/02.webp',
        'titulo' => 'apartamento final 2',
        'metragem' => '130m²',
        'suites' => '3 suítes',
    ],
    [
        'imagem_desktop' => 'plantas/03.webp',
        'titulo' => 'apartamento final 3',
        'metragem' => '90m²',
        'suites' => '2 suítes',
    ],
    [
        'imagem_desktop' => 'plantas/04.webp',
        'titulo' => 'apartamento final 4',
        'metragem' => '90m²',
        'suites' => '2 suítes',
    ],
    [
        'imagem_desktop' => 'plantas/05.webp',
        'titulo' => 'apartamento final 5',
        'metragem' => '94m²',
        'suites' => '2 suítes',
    ],
    [
        'imagem_desktop' => 'plantas/06.webp',
        'titulo' => 'apartamento final 6',
        'metragem' => '94m²',
        'suites' => '2 suítes',
    ]
];
?>

<section class="section-plantas pt120 is-relative" id="plantas" style="<?=$MOBILE ? 'padding-bottom: 110px;' : '';?>">
    <img src="<?=IMG.'folha-horizontal.webp'?>" class="folha-horizontal" alt="folha">
    <div class="wrap wide pl10-mobile pr10-mobile">

        <div class="columns is-centered is-mobile">
            <div class="column is-one-fifth-tablet is-2-mobile pl0 pr0 pr0-mobile is-flex is-justify-content-flex-end">
                <hr class="is-full mt45 mt30-tablet mt25-mobile waypoint animation_scale_d1">
            </div>
            <div class="column is-4-tablet is-8-mobile">
                <h2 class="bigger has-text-centered  mb10 mb0-mobile waypoint animation_bottom">apartamentos</h2>
            </div>
            <div class="column is-one-fifth-tablet is-2-mobile pl0 pr0 pl0-mobile">
                <hr class="is-full mt45 mt30-tablet mt25-mobile waypoint animation_scale_d1">
            </div>
        </div>


        <div class="columns is-centered is-mobile mb0-mobile">
            <div class="column is-9-tablet is-12-mobile">
                <div class="plantas-nav is-flex  mt10-mobile is-relative waypoint animation_bottom" id="plantas-nav">
                    <a class="" ><span>final 1</span></a>
                    <a class="" ><span>final 2</span></a>
                    <a class="" ><span>final 3</span></a>
                    <a class="" ><span>final 4</span></a>
                    <a class="" ><span>final 5</span></a>
                    <a class="" ><span>final 6</span></a>
                </div>
            </div>
        </div>


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



            <?php foreach ($plantas as $planta): ?>
                <div class="li">
                    <div class="planta-content">

                        <div class="box-img has-text-centered">
                            <picture>
                                <img src="<?= IMG . $planta['imagem_desktop']; ?>" alt="planta">
                            </picture>
                        </div>

                        <div class="description">
                            <h2 class="medium"><?= $planta['titulo']; ?></h2>

                            <!-- ÍCONE FIXO -->
                            <div class="atributo-item">
                                <img src="<?= IMG.'icons/metragem.webp'; ?>" alt="">
                                <h2 class="mb0"><?= $planta['metragem']; ?></h2>
                            </div>

                            <!-- ÍCONE FIXO -->
                            <div class="atributo-item mt25">
                                <img src="<?= IMG.'icons/cama.webp'; ?>" alt="">
                                <h2 class="mb0"><?= $planta['suites']; ?></h2>
                            </div>

                            <p class="mt20">
                                Churrasqueira a carvão <br>
                                Piso vinílico nas áreas íntimas <br>
                                Quartos com persianas embutidas <br>
                                Fechadura biométrica nas portas de entrada <br>
                            </p>

                            <p class="color-primary mt25">
                                Cada ambiente convida a sentir a calma e o frescor <br>
                                da Praia Brava dentro de casa. <br>
                            </p>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>


        </div>

    </div>



</section>


<section class="section-carousel second pt0 pb0 is-relative pt80-mobile pb80-mobile pt100-notebook pb50-notebook pt100-tablet " id="galeria">
    <div class="wrap pl50-mobile pr50-mobile">
        <img src="<?=IMG.'paper-background-carousel.webp'?>" class="paper-background " alt="">


        <div class="swiper slide-imoveis second swiper-imoveis mt60 pb150 mb0-tablet mt15-mobile mb10-mobile">
            <div class="swiper-wrapper">
                <?php foreach ($qGaleria2 as $card): ?>
                    <div class="swiper-slide" data-title="<?= $card->legenda; ?>">
                        <a
                                href="<?=  HTTP_UPLOADS_IMG.'lg-'.$card->arquivo; ?>"
                                data-fancybox="galeria-1"
                                data-caption="<?= $card->legenda; ?>"
                        >
                            <h2><?= $card->legenda; ?></h2>
                            <figure class="image-container">
                                <img
                                        src="<?= HTTP_UPLOADS_IMG.($MOBILE ? 'tb-' : 'md-').$card->arquivo; ?>"
                                        alt="<?= $card->legenda; ?>"
                                >
                            </figure>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-scrollbar"></div>
        </div>

    </div>
</section>


<section class="section-localizacao">
    <div class="grid-wrap">
        <div class="side-col">
            <div class="square-fill"></div>
        </div> <!-- Coluna lateral esquerda (12.76%) -->

        <div>
            <img src="<?=IMG.'brava-riserva-panoramico.webp'?>" class="is-block" alt="">

            <div class="description-content">

                <div class="conexao-container is-relative">
                    <!-- Bloco de informações com fundo claro -->
                    <div class="conexao-block pt50 pb45 pl50 pr50">
                        <h2 class="color-primary">
                            conexao <br>
                            urbana
                        </h2>

                        <p class="is-relative">
                            <img src="<?=IMG.'icons/pin-locale.webp'?>" class="" alt="">
                            Av.Osvaldo reis, 2576 <br>
                            Praia Brava | Itajaí SC <a href="https://maps.app.goo.gl/y8cebhg1GsWoyPuP7" target="_blank">(ver no mapa)</a>
                        </p>


                        <!-- Bloco de cliente -->
                        <div class="cliente-block permutante mt80">
                            <small>permutante</small>
                            <img src="<?=IMG.'brm.webp'?>" class="" alt="">
                        </div>

                        <!-- Bloco de permutante (opcional) -->
                        <div class="cliente-block mt35">
                            <small>construcao e incorporação</small>
                            <img src="<?=IMG.'clarus-construcao.webp'?>" class="" alt="">
                        </div>
                    </div>

                    <img src="<?=IMG.'folha-background-vertical-baixo.webp'?>" class="folha" alt="">
                </div>

                <div class="text-content">
                    <h2 class="mt50">construir . transformar . encantar</h2>

                    <p>
                        Há 15 anos, a <strong>Clarus</strong> desenvolve projetos onde a vida encontra novas formas de acontecer.
                        <br><br>
                        Com atuação sólida em Itajaí (SC) e reconhecimento pela entrega rigorosa, transparência e cuidado em cada detalhe, seguimos movidos pelo  desejo de transformar espaços em experiências e de encantar quem escolhe viver em nossos empreendimentos.
                        <br><br>
                        Buscamos localizações que elevem o cotidiano e inspirem novos modos de morar. Assim chegamos à <strong>Praia Brava</strong>: para criar um lugar onde natureza, arquitetura e bem-estar caminham em harmonia.
                        <br><br>
                        O <strong>Brava Riserva</strong> nasce desse propósito: oferecer um lar onde a vida flui com mais calma.
                        <br><br>
                        Convidamos você a conhecer a <strong>Clarus</strong> e a fazer parte das histórias que continuamos a construir, com excelência, sensibilidade e compromisso com a vida que acontece dentro e ao redor de cada projeto.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contato-section pt130 pb135">
    <div class="form-block  mt35-mobile" id="contato">

        <div class="top-block">
            <hr>
            <h2 class="mb0">tenho interesse</h2>
            <hr>
        </div>



        <form id="form-contato" class="form-contato" action="" method="post">
            <p class="has-text-centered mt30">
                Preencha o formulário e um de nossos consultores entrará em contato para esclarecer todas as suas dúvidas.
            </p>

            <div class="row mt60">
                <input type="text"  name="nome"     class="input" placeholder="Nome " required />
                <input type="text"  name="telefone" class="input telefone" placeholder="Fone / Whatsapp" required />
                <input type="email" name="email"    class="input" placeholder="Email" required />

                <div class="select">
                    <select name="setor" class="input pt5-mobile" required>
                        <option value="" disabled selected>Selecione o setor</option>
                        <option value="Tenho interesse">Tenho interesse</option>
                        <option value="Sou corretor">Sou corretor</option>
                    </select>
                </div>
            </div>

            <textarea name="mensagem" rows="1" class="input mt60" placeholder="Mensagem" required></textarea>

            <div class="checkbox-group mt30">

                <div class="fs-08 color-white mt10 has-text-left "><small class="color-primary">Ao enviar meus dados confirmo ciência sobre a <a href="#politica-privacidade" data-fancybox data-type="inline" class="color-primary">política de privacidade.</a></small></div>


                <!-- <label class="checkbox">
                    <input type="checkbox" class="checkbox" name="aceite_politica" required>
                    <span class="font-tertiary">Declaro que li e aceito os termos da <span>Política de Privacidade</span>.</span>
                </label> -->

                <label class="checkbox mt20">
                    <input type="checkbox" class="checkbox" name="aceite_contato" value="on">
                    <span class="color-primary">Estou de acordo em receber comunicações e ser acessado para possível atendimento.</span>
                </label>
            </div>

            <div class="mt0 button-container">
                <button class="btn" type="submit" name="submit">
                    <span class="loading-animation"></span>
                    <span class="font-secondary text">enviar</span>
                </button>
            </div>

        </form>
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