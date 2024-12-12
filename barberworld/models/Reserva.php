<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $ID_Reserva
 * @property string $Data_Hora_Reserva
 * @property int $Utilizador_ID
 * @property string $Codigo_Confirmacao
 * @property string $Observacoes
 * @property int $Servico_ID
 *
 * @property Servico $servico
 * @property Utilizador $utilizador
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Data_Hora_Reserva', 'Utilizador_ID', 'Codigo_Confirmacao', 'Observacoes', 'Servico_ID'], 'required'],
            [['Utilizador_ID', 'Servico_ID'], 'integer'],
            [['Data_Hora_Reserva'], 'safe'],
            [['Codigo_Confirmacao', 'Observacoes'], 'string', 'max' => 255],
            [['ID_Reserva'], 'safe'],
            [['Utilizador_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::class, 'targetAttribute' => ['Utilizador_ID' => 'ID_Utilizador']],
            [['Servico_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Servico::class, 'targetAttribute' => ['Servico_ID' => 'ID_Servico']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Reserva' => 'Id Reserva',
            'Data_Hora_Reserva' => 'Data Hora Reserva',
            'Utilizador_ID' => 'Utilizador ID',
            'Codigo_Confirmacao' => 'Codigo Confirmacao',
            'Observacoes' => 'Observacoes',
            'Servico_ID' => 'Servico ID',
        ];
    }

    /**
     * Gets query for [[Servico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServico()
    {
        return $this->hasOne(Servico::class, ['ID_Servico' => 'Servico_ID']);
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
