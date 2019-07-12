 <?php

use yii\helpers\Html;
use app\models\Event;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
        <h3 align="center">CALENDÁRIO DEFINIDO PARA ABASTECIMENTO</h3>
      <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
        'lang' => 'pt-br',
        
         
        //... more options to be defined here!
      ],
        
        'events'=> $events,
  )); ?>
    </div>
    </div>
</div>