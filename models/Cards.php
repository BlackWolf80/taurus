<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property integer $id
 * @property integer $username
 * @property string $name
 * @property string $last_name
 * @property string $phone
 * @property integer $points
 * @property string $password
 * @property string $auth_key
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cards';
    }



    public function getOrders(){
        return $this->hasMany (Orders::className (),['card_id' => '']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'name', 'last_name', 'password'], 'required'],
            [['username', 'points'], 'integer'],
            [['name', 'last_name', 'password', 'auth_key'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 25],
        ];
    }

}
