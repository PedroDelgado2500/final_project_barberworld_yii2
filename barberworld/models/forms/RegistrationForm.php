<?php
namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\Utilizador; // Importe a classe Utilizador aqui

class RegistrationForm extends Model
{
    public $Nome;
    public $Email;
    public $Senha;
    public $Telefone;
    public $IsAdmin;

    public function rules()
    {
        return [
            [['Nome', 'Email', 'Senha', 'Telefone'], 'required'],
            [['Telefone'], 'integer'],
            [['IsAdmin'], 'boolean'],
            [['Nome', 'Email', 'Senha'], 'string', 'max' => 255],
            ['Email', 'email'],
            ['Email', 'unique', 'targetClass' => 'app\models\Utilizador', 'message' => 'This email address has already been taken.'],
        ];
    }

    public function register()
{
    if ($this->validate()) {
        $user = new Utilizador();
        $user->Nome = $this->Nome;
        $user->Email = $this->Email;
        $user->Senha = Yii::$app->security->generatePasswordHash($this->Senha);
        $user->Telefone = $this->Telefone;
        $user->IsAdmin = $this->IsAdmin;
        if ($user->save()) {
            // Adicionar lógica para adicionar usuário ao CRUD, se necessário
            return true;
        }
    }
    return false;
}


}
