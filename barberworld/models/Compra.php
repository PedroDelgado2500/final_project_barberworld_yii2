<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property int $ID_Compra
 * @property string $Data_Hora_Compra
 * @property int $Quantidade
 * @property float $Valor_Total
 * @property int $Utilizador_ID
 *
 * @property Produto[] $produtos
 * @property Utilizador $utilizador
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Compra', 'Data_Hora_Compra', 'Quantidade', 'Valor_Total', 'Utilizador_ID'], 'required'],
            [['ID_Compra', 'Quantidade', 'Utilizador_ID'], 'integer'],
            [['Data_Hora_Compra'], 'safe'],
            [['Valor_Total'], 'number'],
            [['ID_Compra'], 'unique'],
            [['Utilizador_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::class, 'targetAttribute' => ['Utilizador_ID' => 'ID_Utilizador']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Compra' => 'Id Compra',
            'Data_Hora_Compra' => 'Data Hora Compra',
            'Quantidade' => 'Quantidade',
            'Valor_Total' => 'Valor Total',
            'Utilizador_ID' => 'Utilizador ID',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['Compra_ID' => 'ID_Compra']);
    }

    /**
     * Gets query for [[Utilizador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizador()
    {
        return $this->hasOne(Utilizador::class, ['ID_Utilizador' => 'Utilizador_ID']);
    }
}
