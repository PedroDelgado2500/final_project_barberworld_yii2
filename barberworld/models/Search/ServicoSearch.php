<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servico;

/**
 * ServicoSearch represents the model behind the search form of `app\models\Servico`.
 */
class ServicoSearch extends Servico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Servico', 'Duracao_Estimada', 'Barbearia_ID'], 'integer'],
            [['Nome_Servico', 'Disponibilidade'], 'safe'],
            [['Preco'], 'number'],
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
        $query = Servico::find();

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
            'ID_Servico' => $this->ID_Servico,
            'Preco' => $this->Preco,
            'Duracao_Estimada' => $this->Duracao_Estimada,
            'Barbearia_ID' => $this->Barbearia_ID,
        ]);
        

        $query->andFilterWhere(['like', 'Nome_Servico', $this->Nome_Servico])
        ->andFilterWhere([
            'or',
            ['Disponibilidade' => $this->Disponibilidade == 'Sim' || $this->Disponibilidade == 'sim' || $this->Disponibilidade == 'SIM'|| $this->Disponibilidade == 's' || $this->Disponibilidade == 'S' ? 1 : 0],
            ['Disponibilidade' => $this->Disponibilidade == 'Não' || $this->Disponibilidade == 'não' || $this->Disponibilidade == 'nao'|| $this->Disponibilidade == 'NÃO' || $this->Disponibilidade == 'NAO'|| $this->Disponibilidade == 'n'|| $this->Disponibilidade == 'N'? 0 : 1],
        ]);

        return $dataProvider;
    }
}
