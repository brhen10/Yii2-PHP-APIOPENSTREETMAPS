<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rua".
 *
 * @property int $idrua
 * @property string $nome
 * @property string $bairro
 * @property int $setor_idsetor
 *
 * @property Setor $setorIdsetor
 */
class Rua extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rua';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['setor_idsetor'], 'integer'],
            [['nome', 'bairro'], 'string', 'max' => 200],
            [['setor_idsetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['setor_idsetor' => 'idsetor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrua' => Yii::t('app', 'Idrua'),
            'nome' => Yii::t('app', 'Nome'),
            'bairro' => Yii::t('app', 'Bairro'),
            'setor_idsetor' => Yii::t('app', 'Setor Idsetor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSetorIdsetor()
    {
        return $this->hasOne(Setor::className(), ['idsetor' => 'setor_idsetor']);
    }
}
