<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barbearia".
 *
 * @property int $ID_Barbearia
 * @property string $Nome_Barbearia
 * @property string $Pais
 * @property string $Cidade
 * @property string $Endereco
 * @property string $Descricao
 * @property string $Horario_Funcionamento
 *
 * @property Servico[] $servicos
 */
class Barbearia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barbearia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_Barbearia', 'Nome_Barbearia', 'Pais', 'Cidade', 'Endereco', 'Descricao', 'Horario_Funcionamento'], 'required'],
            [['ID_Barbearia'], 'integer'],
            [['Nome_Barbearia', 'Pais', 'Cidade', 'Endereco', 'Descricao', 'Horario_Funcionamento'], 'string', 'max' => 255],
            [['ID_Barbearia'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_Barbearia' => 'Id Barbearia',
            'Nome_Barbearia' => 'Nome Barbearia',
            'Pais' => 'Pais',
            'Cidade' => 'Cidade',
            'Endereco' => 'Endereco',
            'Descricao' => 'Descricao',
            'Horario_Funcionamento' => 'Horario Funcionamento',
        ];
    }

    /**
     * Gets query for [[Servicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicos()
    {
        return $this->hasMany(Servico::class, ['Barbearia_ID' => 'ID_Barbearia']);
    }
}
