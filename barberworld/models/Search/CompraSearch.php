<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Compra;

/**
 * CompraSearch represents the model behind the search form of `app\models\Compra`.
 */
class CompraSearch extends Compra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Compra', 'Quantidade', 'Utilizador_ID'], 'integer'],
            [['Data_Hora_Compra'], 'safe'],
            [['Valor_Total'], 'number'],
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
        $query = Compra::find();

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
            'ID_Compra' => $this->ID_Compra,
            'Data_Hora_Compra' => $this->Data_Hora_Compra,
            'Quantidade' => $this->Quantidade,
            'Valor_Total' => $this->Valor_Total,
            'Utilizador_ID' => $this->Utilizador_ID,
        ]);

        return $dataProvider;
    }
}
