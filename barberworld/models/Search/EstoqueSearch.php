<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estoque;

/**
 * EstoqueSearch represents the model behind the search form of `app\models\Estoque`.
 */
class EstoqueSearch extends Estoque
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Estoque', 'Quantidade_Estoque'], 'integer'],
            [['Nome_Estoque'], 'safe'],
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
        $query = Estoque::find();

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
            'ID_Estoque' => $this->ID_Estoque,
            'Quantidade_Estoque' => $this->Quantidade_Estoque,
        ]);

        $query->andFilterWhere(['like', 'Nome_Estoque', $this->Nome_Estoque]);

        return $dataProvider;
    }
}
