<?php

namespace app\models;

use Yii;
use yii\base\model;
use \yii\db\ActiveRecord; 
use app\models\Measure;

class Application extends ActiveRecord
{
	public static function tableName()
	{
		return 'application';
	}
    public function getMeasure()
    {
        return $this->hasOne(Measure::className(), ['id' => 'id_measure']);
    }
} 