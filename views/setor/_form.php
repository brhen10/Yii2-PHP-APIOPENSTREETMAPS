<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Setor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vlat1')->textInput() ?>

    <?= $form->field($model, 'vlong1')->textInput() ?>

    <?= $form->field($model, 'vlat2')->textInput() ?>

    <?= $form->field($model, 'vlong2')->textInput() ?>

    <?= $form->field($model, 'vlat3')->textInput() ?>

    <?= $form->field($model, 'vlong3')->textInput() ?>

    <?= $form->field($model, 'vlat4')->textInput() ?>

    <?= $form->field($model, 'vlong4')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
