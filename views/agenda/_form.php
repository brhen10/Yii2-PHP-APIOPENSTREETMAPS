<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use yii\helpers\ArrayHelper;
use app\models\Setor;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Aluno */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);

    echo FormGrid::widget([
        'model'=>$model,
        'form'=>$form,
        'autoGenerateColumns'=>true,
        'rows'=>[
            [
                'contentBefore'=>'<legend class="text-info"><small>Informações de Agendamento</small></legend>',
                'attributes'=>[       // 2 column layout
                    'data'=>['type'=>Form::INPUT_WIDGET, 'widgetClass'=>'\kartik\date\DatePicker', 'hint'=>'(dd/mm/yyyy)'],
                 ]
            ],
            [
                'attributes'=>[       // 2 column layout
                    'descricao'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'...']],
                    'setor_idsetor'=>[
                        'type' => Form::INPUT_DROPDOWN_LIST, 
                        'items'=>ArrayHelper::map(Setor::find()->orderBy('nome')->asArray()->all(), 'idsetor', 'nome')
                    ],
            ],
        ],
            
            [
                'attributes'=>[       // 3 column layout
                    'actions'=>[    // embed raw HTML content
                        'type'=>Form::INPUT_RAW, 
                        'value'=>  '<div style="text-align: right; margin-top: 20px">' . 
                            Html::resetButton('Limpar', ['class'=>'btn btn-default']) . ' ' .
                            Html::submitButton('Cadastrar', ['class'=>'btn btn-primary']) . 
                            '</div>'
                    ],
                ],
            ],
        ]
    ]);
ActiveForm::end();

?>

