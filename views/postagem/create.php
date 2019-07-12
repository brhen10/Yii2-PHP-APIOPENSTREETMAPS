<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Postagem */

$this->title = Yii::t('app', 'Create Postagem');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Postagems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postagem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
