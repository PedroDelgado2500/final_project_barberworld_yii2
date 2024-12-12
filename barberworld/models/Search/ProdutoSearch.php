<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Produto', 'Compra_ID', 'Estoque_ID'], 'integer'],
            [['Nome_Produto', 'Descricao'], 'safe'],
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
        $query = Produto::find();

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
            'ID_Produto' => $this->ID_Produto,
            'Preco' => $this->Preco,
            'Compra_ID' => $this->Compra_ID,
            'Estoque_ID' => $this->Estoque_ID,
        ]);

        $query->andFilterWhere(['like', 'Nome_Produto', $this->Nome_Produto])
            ->andFilterWhere(['like', 'Descricao', $this->Descricao]);

        return $dataProvider;
    }
}
