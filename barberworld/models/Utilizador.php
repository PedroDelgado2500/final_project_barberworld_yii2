<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utilizador".
 *
 * @property int $ID_Utilizador
 * @property string $Nome
 * @property string $Email
 * @property string $Senha
 * @property int $Telefone
 * @property bool $IsAdmin
 *
 * @property Compra[] $compras
 * @property Reserva[] $reservas
 */
class Utilizador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilizador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Utilizador', 'Nome', 'Email', 'Senha', 'Telefone'], 'required'],
            [['ID_Utilizador', 'Telefone'], 'integer'],
            [['IsAdmin'], 'boolean'],
            [['Nome', 'Email', 'Senha'], 'string', 'max' => 255],
            [['ID_Utilizador'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Utilizador' => 'Id Utilizador',
            'Nome' => 'Nome',
            'Email' => 'Email',
            'Senha' => 'Senha',
            'Telefone' => 'Telefone',
            'IsAdmin' => 'Is Admin',
        ];
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::class, ['Utilizador_ID' => 'ID_Utilizador']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['Utilizador_ID' => 'ID_Utilizador']);
    }

    
}
