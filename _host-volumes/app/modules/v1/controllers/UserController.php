<?php


namespace app\modules\v1\controllers;

use app\modules\v1\models\User;

use app\modules\v1\models\UserSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = User::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

//    public function actions()
//    {
//        $actions = parent::actions();
//
//        // disable the "delete" and "create" actions
////        unset($actions['delete'], $actions['create']);
//
//        // customize the data provider preparation with the "prepareDataProvider()" method
//        //$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//
////        $actions['index']['dataFilter'] = [
////            'class' => 'yii\data\ActiveDataFilter',
////            'searchModel' => function () {
////                return (new \yii\base\DynamicModel(['id' => null, 'status' => null]))
////                    ->addRule('id', 'integer')
////                    ->addRule('status', 'integer',11);
////                    //->addRule('company_name', 'string');
////            },
////        ];
//        return $actions;
//    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    /**
     * @return \yii\data\ActiveDataProvider
     */
    public function prepareDataProvider()
    {
        $searchModel = new UserSearch();
        return $searchModel->search(\Yii::$app->request->queryParams);

    }
}