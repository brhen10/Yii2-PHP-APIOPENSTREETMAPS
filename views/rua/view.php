<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rua */

$this->title = $model->idrua;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ruas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rua-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idrua], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idrua], [
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
            'idrua',
            'nome',
            'bairro',
            'setor_idsetor',
        ],
    ]) ?>

</div>
