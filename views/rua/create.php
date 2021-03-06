<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rua */

$this->title = Yii::t('app', 'Create Rua');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ruas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rua-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listSetores' => $listSetores,
    ]) ?>

</div>
