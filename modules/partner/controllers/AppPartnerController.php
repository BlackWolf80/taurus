<?php
namespace app\modules\partner\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;



class AppPartnerController extends Controller
{

//    public function behaviors(){
//
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['login', 'logout', 'signup'],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['login', 'signup'],
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['logout'],
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//        ];
//
//    }

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }


    public function debug($arr)
    {
        echo '<pre>'. print_r($arr, true).'</pre>';
    }




}
function debug($arr){echo '<pre>'. print_r($arr, true).'</pre>';}