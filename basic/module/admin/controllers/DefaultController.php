<?php

namespace app\module\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Measure;
use app\models\Application;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
	    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
         $dataProvider = new ActiveDataProvider([
            'query' => Measure::find(),
        ]);
        if (Yii::$app->user->identity)
        {
            return $this->render('index', ['dataProvider' => $dataProvider,]);
        }
        //return $this->render('index', ['dataProvider' => $dataProvider,]);
        return $this->goHome();
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Measure();

        if ($model->load(Yii::$app->request->post())) {
        	 $model->name = $_POST['Measure']['name'];
        	 $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'name' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
        	$model->name = $_POST['Measure']['name'];
        	 $model->save();
            return $this->redirect(['view', 'id' => $model->id, 'name' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Measure::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /*Просмотр завок*/
    public function actionProposal ()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Application::find(),
        ]);

        return $this->render('proposal', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAjaxhome () 
    {
        $row = Application::findOne($_POST['id']);
        if ($row->yesorno==1)
        {
            $row->yesorno = 0;
             /*Yii::$app->mailer->compose()
                ->setFrom('myname@gmail.com')
                ->setTo($row->email)
                ->setSubject('Уведомление об отказе')
                ->setTextBody('Заявки на мероприятие уже не принимаются')
                ->send();*/
        }
        else if ($row->yesorno==0)
        {
            $row->yesorno = 1;
            /*Yii::$app->mailer->compose()
                ->setFrom('myname@gmail.com')
                ->setTo($row->email)
                ->setSubject('Приглашение на мероприятие')
                ->setTextBody('Ждем Вас на нашем мероприятии')
                ->send();*/
        }
        $row->update();
        $dataProvider = new ActiveDataProvider([
            'query' => Application::find(),
        ]);
        echo $this->renderPartial('newtable', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
