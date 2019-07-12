<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 <p>
        <?= Html::button('Cadastrar Usuário', ['value' => Url::to('index.php?r=user/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>
     <?php
    Modal::begin([
        'header' => '<h4>Usuários</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nameuser',
          //  'password',
         //   'access_token',
          //  'auth_Key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
