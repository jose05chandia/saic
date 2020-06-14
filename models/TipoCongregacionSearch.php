<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoCongregacion;

/**
 * TipoCongregacionSearch represents the model behind the search form of `app\models\TipoCongregacion`.
 */
class TipoCongregacionSearch extends TipoCongregacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tcong_codigo'], 'integer'],
            [['tcong_nombre'], 'safe'],
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
        $query = TipoCongregacion::find();

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
            'tcong_codigo' => $this->tcong_codigo,
        ]);

        $query->andFilterWhere(['like', 'tcong_nombre', $this->tcong_nombre]);

        return $dataProvider;
    }
}
