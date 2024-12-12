<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servico".
 *
 * @property int $ID_Servico
 * @property string $Nome_Servico
 * @property string $Disponibilidade
 * @property float $Preco
 * @property int $Duracao_Estimada
 * @property int $Barbearia_ID
 *
 * @property Barbearia $barbearia
 * @property Reserva[] $reservas
 */
class Servico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Servico', 'Nome_Servico', 'Disponibilidade', 'Preco', 'Duracao_Estimada', 'Barbearia_ID'], 'required'],
            [['ID_Servico', 'Duracao_Estimada', 'Barbearia_ID'], 'integer'],
            [['Preco'], 'number'],
            [['Nome_Servico'], 'string', 'max' => 255],
            [['Disponibilidade'], 'boolean'], // Alterado para boolean
            [['ID_Servico'], 'unique'],
            [['Barbearia_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Barbearia::class, 'targetAttribute' => ['Barbearia_ID' => 'ID_Barbearia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Servico' => 'Id Servico',
            'Nome_Servico' => 'Nome Servico',
            'Disponibilidade' => 'Disponibilidade',
            'Preco' => 'Preco',
            'Duracao_Estimada' => 'Duracao Estimada',
            'Barbearia_ID' => 'Barbearia ID',
        ];
    }

    /**
     * Gets query for [[Barbearia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarbearia()
    {
        return $this->hasOne(Barbearia::class, ['ID_Barbearia' => 'Barbearia_ID']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['Servico_ID' => 'ID_Servico']);
    }
}
