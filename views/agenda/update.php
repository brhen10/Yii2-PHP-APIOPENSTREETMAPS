<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agenda */

$this->title = Yii::t('app', 'Update Agenda: ' . $model->idagenda, [
    'nameAttribute' => '' . $model->idagenda,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Agendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idagenda, 'url' => ['view', 'id' => $model->idagenda]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="agenda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
