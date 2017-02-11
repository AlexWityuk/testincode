<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\Pjax;
use app\models\Application;
use yii\captcha\Captcha;
?>
<div class="site-about">
	<div class="body-content">
		<div class="row ">
			<h1>Мероприятие</h1>
			<h2><?php echo $row->name; ?></h2>
		</div>
		<div class="row">
			<h3>Подача заявки на это мероприятие</h3>
			<div class="col-lg-5">

                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'aboutyou')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'yourwork')->textInput(['autofocus' => true]) ?>

                    <?=$form->field($model, 'file')->fileInput() ?>

                    <?= $form->field($model,  'fromknowus')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Записаться на мероприятие', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
		</div>
	</div>
</div>
