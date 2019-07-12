<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Setor */

$this->title = Yii::t('app', 'Update Setor: ' . $model->idsetor, [
    'nameAttribute' => '' . $model->idsetor,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsetor, 'url' => ['view', 'id' => $model->idsetor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="setor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
