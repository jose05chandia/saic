<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonaCongregacion;

/**
 * PersonaCongregacionSearch represents the model behind the search form of `app\models\PersonaCongregacion`.
 */
class PersonaCongregacionSearch extends PersonaCongregacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perc_codigo', 'per_codigo', 'cong_codigo', 'tpcong_codigo', 'epcong_codigo'], 'integer'],
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
        $query = PersonaCongregacion::find();

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
            'perc_codigo' => $this->perc_codigo,
            'per_codigo' => $this->per_codigo,
            'cong_codigo' => $this->cong_codigo,
            'tpcong_codigo' => $this->tpcong_codigo,
            'epcong_codigo' => $this->epcong_codigo,
        ]);

        return $dataProvider;
    }
}
