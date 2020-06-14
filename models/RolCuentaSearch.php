<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RolCuenta;

/**
 * RolCuentaSearch represents the model behind the search form of `app\models\RolCuenta`.
 */
class RolCuentaSearch extends RolCuenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rocu_codigo', 'erocu_codigo', 'rol_codigo', 'id'], 'integer'],
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
        $query = RolCuenta::find();

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
            'rocu_codigo' => $this->rocu_codigo,
            'erocu_codigo' => $this->erocu_codigo,
            'rol_codigo' => $this->rol_codigo,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
