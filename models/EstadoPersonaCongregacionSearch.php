<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoPersonaCongregacion;

/**
 * EstadoPersonaCongregacionSearch represents the model behind the search form of `app\models\EstadoPersonaCongregacion`.
 */
class EstadoPersonaCongregacionSearch extends EstadoPersonaCongregacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['epcong_codigo'], 'integer'],
            [['epcong_nombre'], 'safe'],
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
        $query = EstadoPersonaCongregacion::find();

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
            'epcong_codigo' => $this->epcong_codigo,
        ]);

        $query->andFilterWhere(['like', 'epcong_nombre', $this->epcong_nombre]);

        return $dataProvider;
    }
}
