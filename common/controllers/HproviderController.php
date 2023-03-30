<?php

namespace common\controllers;

use Yii;
use common\models\Hdocord;
use common\models\Henctr;
use common\models\Hpatroom;
use common\models\Hroom;
use common\models\Htelep;
use common\models\Hward;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Hadmlog;
use common\models\Hperson;
use common\models\Hpersonal;


/**
 * HdocordController implements the CRUD actions for Hdocord model.
 */
class HproviderController extends Controller
{

    static  function Fullname($employeeid)
    {
        $model = Hpersonal::findOne($employeeid);
        return  $model->lastname.', '.$model->firstname.' '.$model->middlename;
    }
    
   
    
        
    


}