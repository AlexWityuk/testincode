<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Measure;
use app\models\Application;
use app\models\User;
use app\models\RegForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $array = Measure::find()->all();
        return $this->render('index', ['rows'=>$array]);
    }

    public function actionView($id)
    {
        $row = Measure::find()
            ->where([ 'id' => $id ])
            ->one();

        $model = new RegForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->fio = $_POST['RegForm']['fio'];
            $model->email = $_POST['RegForm']['email'];
            $model->aboutyou = $_POST['RegForm']['aboutyou'];
            $model->yourwork = $_POST['RegForm']['yourwork'];
            $model->fromknowus = $_POST['RegForm']['fromknowus'];
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate() && $model->signup($id)) {
                $path = Yii::$app->params['pathUploads'];
                $model->file->saveAs( $path . $model->file);
                $model = new RegForm();
            }
        }

        return $this->render('view', ['row' => $row, 'model' => $model]);
    }

    public function actionLogin()
    {
        $login_model = new LoginForm();
        
        if ($login_model->load(Yii::$app->request->post()))
        {
            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
        return $this->render('login',['model'=>$login_model]);
    }
}
