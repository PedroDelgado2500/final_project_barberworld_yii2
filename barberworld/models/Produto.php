<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $ID_Produto
 * @property string $Nome_Produto
 * @property string $Descricao
 * @property float $Preco
 * @property int $Compra_ID
 * @property int $Estoque_ID
 *
 * @property Compra $compra
 * @property Estoque $estoque
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Produto', 'Nome_Produto', 'Descricao', 'Preco', 'Compra_ID', 'Estoque_ID'], 'required'],
            [['ID_Produto', 'Compra_ID', 'Estoque_ID'], 'integer'],
            [['Descricao'], 'string'],
            [['Preco'], 'number'],
            [['Nome_Produto'], 'string', 'max' => 255],
            [['ID_Produto'], 'unique'],
            [['Compra_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::class, 'targetAttribute' => ['Compra_ID' => 'ID_Compra']],
            [['Estoque_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Estoque::class, 'targetAttribute' => ['Estoque_ID' => 'ID_Estoque']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Produto' => 'Id Produto',
            'Nome_Produto' => 'Nome Produto',
            'Descricao' => 'Descricao',
            'Preco' => 'Preco',
            'Compra_ID' => 'Compra ID',
            'Estoque_ID' => 'Estoque ID',
        ];
    }

    /**
     * Gets query for [[Compra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(Compra::class, ['ID_Compra' => 'Compra_ID']);
    }

    /**
     * Gets query for [[Estoque]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstoque()
    {
        return $this->hasOne(Estoque::class, ['ID_Estoque' => 'Estoque_ID']);
    }
}
