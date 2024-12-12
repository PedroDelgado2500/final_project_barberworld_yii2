<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form of `app\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Reserva', 'Utilizador_ID', 'Servico_ID'], 'integer'],
            [['Data_Hora_Reserva', 'Codigo_Confirmacao', 'Observacoes'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Reserva::find();

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
            'ID_Reserva' => $this->ID_Reserva,
            'Data_Hora_Reserva' => $this->Data_Hora_Reserva,
            'Utilizador_ID' => $this->Utilizador_ID,
            'Servico_ID' => $this->Servico_ID,
        ]);

        $query->andFilterWhere(['like', 'Codigo_Confirmacao', $this->Codigo_Confirmacao])
            ->andFilterWhere(['like', 'Observacoes', $this->Observacoes]);

        return $dataProvider;
    }
}
