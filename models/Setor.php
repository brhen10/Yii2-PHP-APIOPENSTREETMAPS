<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setor".
 *
 * @property int $idsetor
 * @property string $descricao
 * @property string $nome
 * @property double $latitude
 * @property double $longitude
 * @property string $status
 * @property double $vlat1
 * @property double $vlong1
 * @property double $vlat2
 * @property double $vlong2
 * @property double $vlat3
 * @property double $vlong3
 * @property double $vlat4
 * @property double $vlong4
 */
class Setor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'nome', 'status', 'vlat1', 'vlong1', 'vlat2', 'vlong2', 'vlat3', 'vlong3', 'vlat4', 'vlong4'], 'required'],
            [['latitude', 'longitude', 'vlat1', 'vlong1', 'vlat2', 'vlong2', 'vlat3', 'vlong3', 'vlat4', 'vlong4'], 'number'],
            [['descricao', 'nome', 'status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsetor' => Yii::t('app', 'Idsetor'),
            'descricao' => Yii::t('app', 'Descricao'),
            'nome' => Yii::t('app', 'Nome'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'status' => Yii::t('app', 'Status'),
            'vlat1' => Yii::t('app', 'Vlat1'),
            'vlong1' => Yii::t('app', 'Vlong1'),
            'vlat2' => Yii::t('app', 'Vlat2'),
            'vlong2' => Yii::t('app', 'Vlong2'),
            'vlat3' => Yii::t('app', 'Vlat3'),
            'vlong3' => Yii::t('app', 'Vlong3'),
            'vlat4' => Yii::t('app', 'Vlat4'),
            'vlong4' => Yii::t('app', 'Vlong4'),
        ];
    }

    public function fields()
    {

        return [

                    'id' => 'idsetor',
                    'descricao' => 'descricao',
                    'setor' => 'nome',
                    'status' => 'status',
                    'latitude' => 'vlat1',
                    'longitude' => 'vlong1'
        ];

    }
}
