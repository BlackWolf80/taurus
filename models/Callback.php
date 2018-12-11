<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "callback".
 *
 * @property integer $id
 * @property string $name
 * @property string $phons
 */
class Callback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phons'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['phons'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phons' => 'Phons',
        ];
    }
}
