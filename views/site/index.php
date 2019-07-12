<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use app\models\Event;
use app\models\Agenda;
use app\models\Rua;
use yii\grid\GridView;
use yii\widgets\DetailView;
/* @var $this yii\web\View */

$this->title = 'SIGISAB - Sistema de Controle de Abastecimento';
?>


<div class="site-index">
		<h3 align="center">SETORES DE ABASTECIMENTO DE ÁGUA - CURRAIS NOVOS/RN</h3>
<div class="row">
        <div class="col-sm-3 text-center">
        <h4 align="center">SETOR 01</h4>
        <?php
        $img1 = '@web/mapas/setor011.png';
        $img11 = '@web/mapas/setor01.png';
            echo Html::a(Html::img($img1), ['rua/home']);
        ?>
    </div>
    <div class="row">
        <div class="col-sm-3 text-center">
        <h4 align="center">SETOR 02</h4>
        <?php
        $img2 = '@web/mapas/setor022.png';
            echo Html::a(Html::img($img2), ['rua/home1']);
           // echo Html::a('Visualizar eventos', ['event/index'], ['class' => 'btn btn-success']);
        ?>
    </div>
    <div class="row">
        <div class="col-sm-3 text-center">
        <h4 align="center">SETOR 03</h4>
        <?php
        $img3 = '@web/mapas/setor033.png';
            echo Html::a(Html::img($img3), ['rua/home2']);
           // echo Html::a('Visualizar eventos', ['event/index'], ['class' => 'btn btn-success']);
        ?>
    </div>
   <div class="row">
        <div class="col-sm-3 text-center">
        <h4 align="center">SETOR 04</h4>
        <?php
        $img4 = '@web/mapas/setor044.png';
            echo Html::a(Html::img($img4), ['rua/home3']);
           // echo Html::a('Visualizar eventos', ['event/index'], ['class' => 'btn btn-success']);
        ?>
    </div>
    <div class="container">
    <div class="row">
     <div class="col-sm-12">
            <h3 align="center">POSSÍVEIS AGENDAMENTOS</h3>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],

                    //'idagenda',
                    'data',
                    'setorIdsetor.nome',
                    'descricao',

                    //['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            
             </div>
        </div>
      </div>
      <div class="container">
    <div class="row">
     <div class="col-sm-6">
            <h3 align="center">FEEDBACK DA POPULAÇÃO</h3>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider1,
                'columns' => [
                   // ['class' => 'yii\grid\SerialColumn'],
                   // 'idpostagem',
                    'nome',
                    'mensagem',
                    'setorIdsetor.nome',
                      [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '||RESPOSTAS||',
                        'template' => '{view}',
                        'buttons' => [
                            
                            'view' => function($url, $model, $key) {
                                return Html::a('<span class="fa fa-search"></span>Visualizar', Url::to(['resposta/view', 'id' => $key]));
                            }
                                ]
                            ],
               
                        ],
                    ]);
                    ?>
            
             </div>
                  <div class="col-sm-6"> 

             <h3 align="center">RESPOSTAS AOS QUESTIONAMENTOS</h3>
            <?= GridView::widget([
        'dataProvider' => $dataProvider2,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'idresposta',
            'texto:ntext',
          //  'postagem_idpostagem',

          [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '||PERGUNTAS||',
                        'template' => '{view}',
                        'buttons' => [
                            
                            'view' => function($url, $model, $key) {
                                return Html::a('<span class="fa fa-search"></span>Visualizar', Url::to(['postagem/view', 'id' => $key]));
                            }
                                ]
                            ],
                        ],
                    ]);
                    ?>
            
             </div>
        </div>
   </div>
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
    <div class="jumbotron">
<h3 align="center">MAPA - CURRAIS NOVOS/RN</h3>
        <html>
  <head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
    
    <style>
      #location-map{
        background: #fff;
        border: none;
        height: 540px;
        width: 100%;

        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
      }
    </style>
  </head>
  <body>
    <div id="location-map"></div>
    
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>

    <script type="text/javascript">
      var map = L.map('location-map').setView([	-6.252939, -36.534274], 13);
      mapLink = '<a href="https://openstreetmap.org">OpenStreetMap</a>';
      L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy; ' + mapLink,
          maxZoom: 20,
        }).addTo(map);
        var marker = L.marker([-6.252939, -36.534274]).addTo(map);
    </script>
  </body>
</html>
                </div>

</div>