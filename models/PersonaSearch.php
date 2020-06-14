<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form of `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pers_codigo', 'eper_codigo', 'tper_codigo'], 'integer'],
            [['pers_rut', 'per_fecha_nacimiento','per_fecha_bautismo', 'per_nombre1', 'per_nombre2', 'per_apellido_paterno', 'per_apellido_materno', 'per_telefono', 'per_celular', 'per_email1', 'per_email2', 'per_direccion1', 'per_direccion2', 'per_fotografia'], 'safe'],
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
        $query = Persona::find();

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
            'pers_codigo' => $this->pers_codigo,
            'per_fecha_nacimiento' => $this->per_fecha_nacimiento,
            'per_fecha_bautismo' => $this->per_fecha_bautismo,
            'eper_codigo' => $this->eper_codigo,
            'tper_codigo' => $this->tper_codigo,
        ]);

        $query->andFilterWhere(['like', 'pers_rut', $this->pers_rut])
            ->andFilterWhere(['like', 'per_nombre1', $this->per_nombre1])
            ->andFilterWhere(['like', 'per_nombre2', $this->per_nombre2])
            ->andFilterWhere(['like', 'per_apellido_paterno', $this->per_apellido_paterno])
            ->andFilterWhere(['like', 'per_apellido_materno', $this->per_apellido_materno])
            ->andFilterWhere(['like', 'per_telefono', $this->per_telefono])
            ->andFilterWhere(['like', 'per_celular', $this->per_celular])
            ->andFilterWhere(['like', 'per_email1', $this->per_email1])
            ->andFilterWhere(['like', 'per_email2', $this->per_email2])
            ->andFilterWhere(['like', 'per_direccion1', $this->per_direccion1])
            ->andFilterWhere(['like', 'per_direccion2', $this->per_direccion2])
            ->andFilterWhere(['like', 'per_fotografia', $this->per_fotografia]);

        return $dataProvider;
    }
}
