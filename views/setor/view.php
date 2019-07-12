<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setor */

$this->title = $model->idsetor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idsetor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idsetor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsetor',
            'descricao',
            'nome',
            'latitude',
            'longitude',
            'status',
            'vlat1',
            'vlong1',
            'vlat2',
            'vlong2',
            'vlat3',
            'vlong3',
            'vlat4',
            'vlong4',
        ],
    ]) ?>

</div>
