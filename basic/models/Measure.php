<?php

namespace app\models;

use Yii;
use yii\base\model;


class Measure extends \yii\db\ActiveRecord 
{
	public static function tableName()
	{
		return 'measure';
	}
} 