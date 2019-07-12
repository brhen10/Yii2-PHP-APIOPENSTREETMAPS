<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SetorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idsetor') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'latitude') ?>

    <?= $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'vlat1') ?>

    <?php // echo $form->field($model, 'vlong1') ?>

    <?php // echo $form->field($model, 'vlat2') ?>

    <?php // echo $form->field($model, 'vlong2') ?>

    <?php // echo $form->field($model, 'vlat3') ?>

    <?php // echo $form->field($model, 'vlong3') ?>

    <?php // echo $form->field($model, 'vlat4') ?>

    <?php // echo $form->field($model, 'vlong4') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
