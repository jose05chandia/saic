<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Congregacion;

/**
 * CongregacionSearch represents the model behind the search form of `app\models\Congregacion`.
 */
class CongregacionSearch extends Congregacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cong_codigo', 'econg_codigo', 'tcong_codigo'], 'integer'],
            [['cong_nombre', 'cong_sector', 'cong_fotografia'], 'safe'],
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
        $query = Congregacion::find();

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
            'cong_codigo' => $this->cong_codigo,
            'econg_codigo' => $this->econg_codigo,
            'tcong_codigo' => $this->tcong_codigo,
        ]);

        $query->andFilterWhere(['like', 'cong_nombre', $this->cong_nombre])
            ->andFilterWhere(['like', 'cong_sector', $this->cong_sector]);

        return $dataProvider;
    }
}
