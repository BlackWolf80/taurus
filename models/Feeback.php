<?php
namespace app\models;
use \yii\db\ActiveRecord;


class Feeback extends ActiveRecord
{

    public static function tableName()
    {
        return 'feedback';
    }
}
