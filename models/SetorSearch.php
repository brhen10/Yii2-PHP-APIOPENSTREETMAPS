<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Setor;

/**
 * SetorSearch represents the model behind the search form of `app\models\Setor`.
 */
class SetorSearch extends Setor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsetor'], 'integer'],
            [['descricao', 'nome', 'status'], 'safe'],
            [['latitude', 'longitude', 'vlat1', 'vlong1', 'vlat2', 'vlong2', 'vlat3', 'vlong3', 'vlat4', 'vlong4'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Setor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idsetor' => $this->idsetor,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'vlat1' => $this->vlat1,
            'vlong1' => $this->vlong1,
            'vlat2' => $this->vlat2,
            'vlong2' => $this->vlong2,
            'vlat3' => $this->vlat3,
            'vlong3' => $this->vlong3,
            'vlat4' => $this->vlat4,
            'vlong4' => $this->vlong4,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
