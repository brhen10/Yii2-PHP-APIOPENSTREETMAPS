<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Postagem */

$this->title = Yii::t('app', 'Update Postagem: {name}', [
    'name' => $model->idpostagem,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Postagems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpostagem, 'url' => ['view', 'id' => $model->idpostagem]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="postagem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
