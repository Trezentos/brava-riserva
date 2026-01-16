<?php
require __DIR__ . '/../config.php';
require GESTOR_MODELS . SELF_PAG;



# HEADERS
$_header['titulo'] = ($id?'Editar':'Novo').' Andamento das Obras';

add_javascript([
	"jquery.lightbox.min.js",
	"jquery.ui.widget.js",
	"jquery.iframe-transport.js",
	"jquery.fileupload.js",
	"script.imagens.js",
	"form-empreendimentos.js",
	"script.order.js",
]);

add_style([
	"css/lightbox.css",
	"css/jquery-ui.css",
]);

get_header_gestor();
get_barra_header();
?>

<form name="form" id="form" action="" method="post" enctype="multipart/form-data" role="form">
	
	<!-- BUTTONS -->

	<div id="buttons">
		<div class="pull-left">
			<?php
			btn_save();
			if ($q) btn_delete_form($id);
			?>
		</div>
		<div class="pull-right">
			<?php
			btn_add();
			btn_back();
			?>
		</div>
	</div>

	<!-- END BUTTONS -->




	<!-- TABS -->

	<ul id="tab-nav" class="nav nav-tabs">
		<?php get_tab_item('1', 'Estágio da Obra'); ?>
		<?php get_tab_item('3', 'Galeria de Imagens', $q); ?>
	</ul>

	<!-- END - TABS -->




	<div class="tab-content">
		
		<div id="tab1" class="tab-pane <?=($_GET['tab']==''?'active':'');?> animation_bottom animated">

			<div class="row">
				<div class="form-group col-md-4">
					<?php get_input_text('atualizacao_obras', 'Atualização das Obras', $q->atualizacao_obras) ?>
				</div> 
			</div>

			<div class="row mt40">
				<div class="col-xs-12">
					<fieldset>
						<div class="row">

							<?php foreach ($aEstagiosObra as $legenda => $valor) { ?>

							<div class="form-group col-md-4">
								<?php get_input_range($legenda, $valor, $q->{$legenda}) ?>
							</div>

							<?php } ?>

							<div class="form-group col-md-12">
								<?php //get_input_range('total', 'Total', $q->total, 'range-total', true) ?>
								<?php get_input_range('total', 'Total', $q->total) ?>
							</div>
							
						</div>
					</fieldset>
				</div>
			</div>
		</div>







		<?php $CAT_GAL = 'obras'; ?>

		<div id="tab3" class="tab-pane animation_bottom animated">
			<?php include GESTOR_INCLUDES . 'upload-gallery.php'; ?>
		</div>

	</div>

	<input type="hidden" name="id" value="<?php echo ($id?$id:false); ?>" />
	<input type="hidden" name="action" value="<?php echo ($id?'alterar':'adicionar'); ?>" />
	<input type="hidden" name="cat_imagens" id="cat_imagens" value="noticia" />
	<input type="hidden" name="tabela" id="tabela" value="<?=$__TABLE__?>" />
	<input type="hidden" name="tabela_img" id="tabela_img" value="<?=$__TABLE__IMG?>" />
</form>




<?php include GESTOR_INCLUDES . 'modal-upload.php'; ?>


<?php get_footer_gestor(); ?>