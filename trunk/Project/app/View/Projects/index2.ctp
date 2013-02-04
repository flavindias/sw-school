
<h1>Projetos</h1>
<div id="menuEsquerda">

  
<script type="text/javascript">
 
$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $('.show').click(function(){
          var id = $(this).attr('id');
          $(".slidingDiv").hide();
          $("#div_"+id).slideToggle();
        });
 
});
 
</script>


<?php

 #FUN��O RECURSIVA PARA IMPRIMIR OS FILHOS DE UM PROJETOS E SUAS RESPECTIVAS ATIVIDADES

  function imprimirFilhos($project, $projectsFilhos, $activities) {
    #Percorrendo os projetos filhos usando a condi��o se seu id pai � igual ao id do $projeto
    
    foreach ($projectsFilhos as $projectFilho) {

      if ($project['Project']['id']==$projectFilho['Project']['parent_project_id']) {
        echo '<ul>';

        echo '<a href="#" class="show" id="'.$projectFilho['Project']['id'].'">','<li class="arvore"><span >',$projectFilho['Project']['name'],'</span></a>';

        
        
        imprimirFilhos($projectFilho, $projectsFilhos, $activities);

        echo '</ul>';
        echo '</li>';
      }
    }    
  }

?>


<?php 

  echo '<ul id="red" class="treeview-gray">';

  #Percorrendo os projetos pais

  foreach ($projectsPais as $project) {

    echo '<a href="#" class="show" id="'.$project['Project']['id'].'">','<li class="arvore"><span >',$project['Project']['name'],'</span></a>';

    imprimirFilhos($project, $projectsFilhos, $activities);
    

  }

  echo '</li>';
  echo '</ul>';
  

  echo '</div>';

?>





<?php foreach ($projects as $project) { ?>
 
<div class="slidingDiv" id="div_<?php echo $project['Project']['id']; ?>">
      <h3>
        Projeto - <?php echo $project['Project']['name']; ?> 
        <span class="icon-action">
          <?php echo $this->Html->link(
          $this->Html->image("delete.png", array("alt" => "Deletar")),
          array('action' => 'delete', $project['Project']['id']),
          array('escape'=>false),"Voc� quer excluir realmente ?");?>
        </span>
        
        <span class="icon-action"> 
          <?php echo $this->Html->link(
          $this->Html->image("edit.png", array("alt" => "Editar")),'edit/'.$project['Project']['id'],
          array('escape'=>false)) ?>
        </span> 
      
      </h3>

    <div> 
      <fieldset class='fieldIndexProject'>
        <h4> Dados Projeto </h4>
        <p><span>Sigla: </span> <?php echo $project['Project']['name']; ?></p>
        <p><span>Descri��o: </span><?php echo $project['Project']['description']; ?></p>  
      </fieldset>

      <fieldset class='fieldIndexProject'>
        <h4> Hora Individual </h4>
        <p><span>Hora A: </span><?php echo $project['Project']['a_hours_individual']; ?>h</span></p>
        <p><span>Hora B: </span><?php echo $project['Project']['b_hours_individual']; ?>h</p>
        <p><span>Hora C: </span><?php echo $project['Project']['c_hours_individual']; ?>h</p>
      </fieldset>

      <fieldset class='fieldIndexProject'>
        <h4> Hora em grupo </h4>
        <p><span>Hora A: </span><?php echo $project['Project']['a_hours_group']; ?>h</span></p>
        <p><span>Hora B: </span><?php echo $project['Project']['b_hours_group']; ?>h</p>
        <p><span>Hora C: </span><?php echo $project['Project']['c_hours_group']; ?>h</p>
      </fieldset>
    </div>

  <h2 id="AtividadesEmProjetoIndex2">
    Atividades - <?php echo $project['Project']['name']; ?> 
  </h2>

    <div class="AtividadesEmProjetoIndex2">

      <table cellpadding="0" cellspacing="0">
        <tr>
          <th>Descri��o</th>
          <th class="responsive">Status</th>
          <th class="responsive">Data</th>
          <th class="actions">Visualizar Detalhadamente</th>
        </tr>

        <?php
          
          $i = 0;
          foreach ($activities as $activity){
            $class = null;
            if($i++ % 2 == 0){
              $class = 'class="altrow"';
            }
          
        ?>
        
        <tr <?php echo $class; ?>>
          <td class="descri��o"><?php if ($activity['Activity']['project_id']===$project['Project']['id']){echo $activity['Activity']['description'];}?></td>
          <td class="status"><?php if ($activity['Activity']['project_id']===$project['Project']['id']){echo $activity['Activity']['status'];}?></td>
          <td class="data"><?php if ($activity['Activity']['project_id']===$project['Project']['id']){echo $activity['Activity']['date'];}?></td>

          <div class="actions">

            <td>
              <?php
                if ($activity['Activity']['project_id']===$project['Project']['id']) {
                  echo $this->html->link(
                    $this->html->image("view.png", array('alt' => 'Ver')), array('action' => '../activities/view', $activity['Activity']['id']), array('escape'=>false, 'id'=>'link'));
                }
              ?>
            </td>

          </div>
<?php } ?>
      </table>
  
    </div>  
 </div>

 <?php } ?>
