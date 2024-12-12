<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Barbearia;

/**
 * BarbeariaSearch represents the model behind the search form of `app\models\Barbearia`.
 */
class BarbeariaSearch extends Barbearia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Barbearia'], 'integer'],
            [['Nome_Barbearia', 'Pais', 'Cidade', 'Endereco', 'Descricao', 'Horario_Funcionamento'], 'safe'],
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
        $query = Barbearia::find();

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
            'ID_Barbearia' => $this->ID_Barbearia,
        ]);

        $query->andFilterWhere(['like', 'Nome_Barbearia', $this->Nome_Barbearia])
            ->andFilterWhere(['like', 'Pais', $this->Pais])
            ->andFilterWhere(['like', 'Cidade', $this->Cidade])
            ->andFilterWhere(['like', 'Endereco', $this->Endereco])
            ->andFilterWhere(['like', 'Descricao', $this->Descricao])
            ->andFilterWhere(['like', 'Horario_Funcionamento', $this->Horario_Funcionamento]);

        return $dataProvider;
    }
}
