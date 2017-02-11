<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(['enablePushState' => true]); ?>
<div class="application-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fio:ntext',
            'email:ntext',
            'aboutyou:ntext',
            //'yourwork:ntext',
            'foto:image',
            // 'fromknowus:ntext',
            //'id_measure',
            [
            'attribute' => 'id_measure',
            'value' => 'measure.name',
            ],
            // 'date',
            'yesorno',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'class' => 'yii\grid\CheckboxColumn',
            // вы можете настроить дополнительные свойства здесь.
            ],
        ],
    ]); ?>
</div>
<?php Pjax::end(); ?>