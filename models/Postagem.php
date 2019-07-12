<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "postagem".
 *
 * @property int $idpostagem
 * @property string $nome
 * @property string $mensagem
 * @property int $setor_idsetor
 * @property string $tipo
 *
 * @property Setor $setorIdsetor
 */
class Postagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'postagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'mensagem', 'setor_idsetor', 'tipo'], 'required'],
            [['mensagem'], 'string'],
            [['setor_idsetor'], 'integer'],
            [['nome', 'tipo'], 'string', 'max' => 45],
            [['setor_idsetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['setor_idsetor' => 'idsetor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpostagem' => Yii::t('app', 'Idpostagem'),
            'nome' => Yii::t('app', 'Nome'),
            'mensagem' => Yii::t('app', 'Mensagem'),
            'setor_idsetor' => Yii::t('app', 'Setor Idsetor'),
            'tipo' => Yii::t('app', 'Tipo'),
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
