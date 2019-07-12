<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rua */

$this->title = Yii::t('app', 'Update Rua: ' . $model->idrua, [
    'nameAttribute' => '' . $model->idrua,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ruas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrua, 'url' => ['view', 'id' => $model->idrua]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rua-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listSetores' => $listSetores,
    ]) ?>

</div>
