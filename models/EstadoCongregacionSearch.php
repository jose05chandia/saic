<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoCongregacion;

/**
 * EstadoCongregacionSearch represents the model behind the search form of `app\models\EstadoCongregacion`.
 */
class EstadoCongregacionSearch extends EstadoCongregacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['econg_codigo'], 'integer'],
            [['econg_nombre'], 'safe'],
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
        $query = EstadoCongregacion::find();

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
            'econg_codigo' => $this->econg_codigo,
        ]);

        $query->andFilterWhere(['like', 'econg_nombre', $this->econg_nombre]);

        return $dataProvider;
    }
}
