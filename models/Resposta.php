<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resposta".
 *
 * @property int $idresposta
 * @property string $texto
 * @property int $postagem_idpostagem
 *
 * @property Postagem $postagemIdpostagem
 */
class Resposta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resposta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['texto', 'postagem_idpostagem'], 'required'],
            [['texto'], 'string'],
            [['postagem_idpostagem'], 'integer'],
            [['postagem_idpostagem'], 'exist', 'skipOnError' => true, 'targetClass' => Postagem::className(), 'targetAttribute' => ['postagem_idpostagem' => 'idpostagem']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idresposta' => Yii::t('app', 'Idresposta'),
            'texto' => Yii::t('app', 'Texto'),
            'postagem_idpostagem' => Yii::t('app', 'Postagem Idpostagem'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostagemIdpostagem()
    {
        return $this->hasOne(Postagem::className(), ['idpostagem' => 'postagem_idpostagem']);
    }
}
