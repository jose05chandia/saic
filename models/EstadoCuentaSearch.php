<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoCuenta;

/**
 * EstadoCuentaSearch represents the model behind the search form of `app\models\EstadoCuenta`.
 */
class EstadoCuentaSearch extends EstadoCuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ecu_codigo'], 'integer'],
            [['ecu_nombre', 'ecu_descripcion'], 'safe'],
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
        $query = EstadoCuenta::find();

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
            'ecu_codigo' => $this->ecu_codigo,
        ]);

        $query->andFilterWhere(['like', 'ecu_nombre', $this->ecu_nombre])
            ->andFilterWhere(['like', 'ecu_descripcion', $this->ecu_descripcion]);

        return $dataProvider;
    }
}
