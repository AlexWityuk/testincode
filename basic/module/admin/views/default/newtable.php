<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<p>
    <?= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'fio:ntext',
        'email:ntext',
        'aboutyou:ntext',
        'foto:image',
        [
        'attribute' => 'id_measure',
        'value' => 'measure.name',
        ],
        'yesorno',

        [
        'class' => 'yii\grid\CheckboxColumn',
        ],
    ],
]); ?>