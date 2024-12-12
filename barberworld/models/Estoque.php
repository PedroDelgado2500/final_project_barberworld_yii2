<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estoque".
 *
 * @property int $ID_Estoque
 * @property int $Quantidade_Estoque
 * @property string $Nome_Estoque
 *
 * @property Produto[] $produtos
 */
class Estoque extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Estoque', 'Quantidade_Estoque', 'Nome_Estoque'], 'required'],
            [['ID_Estoque', 'Quantidade_Estoque'], 'integer'],
            [['Nome_Estoque'], 'string', 'max' => 255],
            [['ID_Estoque'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Estoque' => 'Id Estoque',
            'Quantidade_Estoque' => 'Quantidade Estoque',
            'Nome_Estoque' => 'Nome Estoque',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['Estoque_ID' => 'ID_Estoque']);
    }
}
