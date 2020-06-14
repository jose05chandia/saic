<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoPersona;

/**
 * EstadoPersonaSearch represents the model behind the search form of `app\models\EstadoPersona`.
 */
class EstadoPersonaSearch extends EstadoPersona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eper_codigo'], 'integer'],
            [['eper_nombre', 'eper_descripcion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = EstadoPersona::find();

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
            'eper_codigo' => $this->eper_codigo,
        ]);

        $query->andFilterWhere(['like', 'eper_nombre', $this->eper_nombre])
            ->andFilterWhere(['like', 'eper_descripcion', $this->eper_descripcion]);

        return $dataProvider;
    }
}
