<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoPersona;

/**
 * TipoPersonaSearch represents the model behind the search form of `app\models\TipoPersona`.
 */
class TipoPersonaSearch extends TipoPersona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tper_codigo'], 'integer'],
            [['tper_nombre', 'tper_descripcion'], 'safe'],
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
        $query = TipoPersona::find();

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
            'tper_codigo' => $this->tper_codigo,
        ]);

        $query->andFilterWhere(['like', 'tper_nombre', $this->tper_nombre])
            ->andFilterWhere(['like', 'tper_descripcion', $this->tper_descripcion]);

        return $dataProvider;
    }
}
