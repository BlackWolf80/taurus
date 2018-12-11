<?php
namespace app\models;
use function Faker\Provider\pt_BR\check_digit;
use yii\db\ActiveRecord;

class Filters extends ActiveRecord {

    public function addToFilter(){

            $_SESSION['type1'] = false;
            $_SESSION['type2'] = false;
            $_SESSION['type3'] = false;
            $_SESSION['type4'] = false;
            $_SESSION['type5'] = false;
            $_SESSION['type6'] = false;
            $_SESSION['type7'] = false;
            $_SESSION['type8'] = false;

    }

    public function selectFilter($type){

        $_SESSION['type1'] = $type['1'];
        $_SESSION['type2'] = $type['2'];
        $_SESSION['type3'] = $type['3'];
        $_SESSION['type4'] = $type['4'];
        $_SESSION['type5'] = $type['5'];
        $_SESSION['type6'] = $type['6'];
        $_SESSION['type7'] = $type['7'];
        $_SESSION['type8'] = $type['8'];
    }



}