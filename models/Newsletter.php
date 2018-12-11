<?php
namespace app\models;
use \yii\db\ActiveRecord;

class Newsletter extends ActiveRecord
{
    public static function tableName()
    {
        return 'newsletter';
    }

    public function rules()
    {
        return [
            [['email'],'email'],
        ];
    }


}
