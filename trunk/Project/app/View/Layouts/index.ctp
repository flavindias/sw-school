<!DOCTYPE html>

<html>
    
    <head>
		<title><?php echo $title_for_layout; ?></title>
		
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<?php echo $this->Html->css('style-sws'); ?>
		<?php echo $this->Html->script('jquery-1.7.1.min'); ?>
		<?php echo $this->Html->script('aplicacao'); ?>
		<?php echo $this->Html->script('anexo'); ?>			
		<?php echo $this->Html->script('jquery.fancybox'); ?>
		<?php echo $this->Html->script('projetos'); ?>
				
    </head>

    <body>
    	<?php echo $this->Session->flash(); ?>
        
	<?php //só mostrar o botão cadastrar se for usuário admin
		if (in_array($tipo_usuario , array('admin','cons_manager','rel_manager'))){
			echo '<div id="bt-cadastrar">';	
			echo $this->Html->link("Cadastrar", array('action' => 'add'),array('class'=>'botao'));
			echo '</div>';
		}
	?>		
				
		<?php include 'includes/menu.php'; ?>
		
		<div class="conteudo">
			<h1><?php echo $title_for_layout; ?></h1>	        
			<?php echo $this->fetch('content'); ?>
	    </div>
	   	</div>

    </body>



</html>