<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoRolCuenta;

/**
 * EstadoRolCuentaSearch represents the model behind the search form of `app\models\EstadoRolCuenta`.
 */
class EstadoRolCuentaSearch extends EstadoRolCuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['erocu_codigo'], 'integer'],
            [['erocu_nombre', 'erocu_descripcion'], 'safe'],
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
        $query = EstadoRolCuenta::find();

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
            'erocu_codigo' => $this->erocu_codigo,
        ]);

        $query->andFilterWhere(['like', 'erocu_nombre', $this->erocu_nombre])
            ->andFilterWhere(['like', 'erocu_descripcion', $this->erocu_descripcion]);

        return $dataProvider;
    }
}
