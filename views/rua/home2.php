<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use app\models\Rua;
use yii\grid\GridView;
?>

<!DOCTYPE html>
<html>
    <body>
      <head>
        
        <style>
                table, td {
                border: 2px solid black;
                }
                th {
                display: table-cell;
                vertical-align: inherit;
                font-weight: bold;
                text-align: center;
}
        </style>
      </head>
        
   <h1 align="center">RUAS POR SETOR</h1>
        <table border="1" width="100%" align="center">
            <tr>
            <th>IDENTIFICADOR</th>
            <th>NOME</th>
            <th>BAIRRO</th>
            <th>SETOR</th>
            </tr>   

     <?php foreach ($ruas as $rua): ?>
        
            <tr>
            <td align="center"><?= Html::encode("{$rua->idrua}")?></td>
            <td><?= Html::encode("{$rua->nome}")?></td>
            <td><?= Html::encode("{$rua->bairro}")?></td>
            <td align="center"><?= Html::encode("{$rua->setor_idsetor}")?></td>
            </tr>
  
         <?php endforeach; ?>
      </table>
       </br>
    <p>
             <?= Html::a(Yii::t('app', 'Voltar'), ['site/index'], ['class' => 'btn btn-success']) ?> 
    </p>
  </body>
  </html>