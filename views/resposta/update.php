<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resposta */

$this->title = Yii::t('app', 'Update Resposta: {name}', [
    'name' => $model->idresposta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Respostas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idresposta, 'url' => ['view', 'id' => $model->idresposta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="resposta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
