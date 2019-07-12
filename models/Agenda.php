<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property int $idagenda
 * @property string $data
 * @property int $setor_idsetor
 * @property string $descricao
 *
 * @property Setor $setorIdsetor
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'setor_idsetor'], 'required'],
            [['data'], 'safe'],
            [['setor_idsetor'], 'integer'],
            [['descricao'], 'string', 'max' => 200],
            [['setor_idsetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['setor_idsetor' => 'idsetor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idagenda' => Yii::t('app', 'Idagenda'),
            'data' => Yii::t('app', 'Data'),
            'setor_idsetor' => Yii::t('app', 'Setor Idsetor'),
            'descricao' => Yii::t('app', 'Descricao'),
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
