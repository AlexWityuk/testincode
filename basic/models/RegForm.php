<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Application;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegForm extends Model
{
    public $fio;
    public $email;
    public $aboutyou;
    public $yourwork;
    public $file;
    public $fromknowus;

	public function rules()
    {
        return [
            [['fio', 'email', 'aboutyou', 'yourwork', 'fromknowus'], 'required'],
            ['email', 'email'],
            [['file'], 'file', 'extensions' => 'png, jpg', 
                    'skipOnEmpty' => false]
        ];
    }

    public function signup($id)
    {
        $user = new Application();
       	$user->fio = $this->fio;
        $user->email = $this->email;
        $user->aboutyou = $this->aboutyou;
        $user->yourwork = $this->yourwork;
        $user->foto = '/img/user_photo/'. $this->file;
        $user->fromknowus = $this->fromknowus;
        $user->id_measure = $id;
        $user->date = date("Y-m-d");
        $user->yesorno = 1;
        return $user->save();
    }

}