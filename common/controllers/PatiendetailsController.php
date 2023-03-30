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


/**
 * HdocordController implements the CRUD actions for Hdocord model.
 */
class PatiendetailsController extends Controller
{

    static  function Fullname($hperid)
    {
        $model = Hperson::findOne($hperid);
        return  $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle;
        
    }
    
    static  function Contact($hperid)
    {
        
        $contact = "";
        $modelcontact = Htelep::find()
        ->where(['hpercode' => $hperid])
        ->one();
        
        //******* Contact
        if($modelcontact != NULL)
        {
            return $modelcontact->pattel;
        }
        
        else
        {
            return "None";
        }
        
    }
    
    static  function Civilstatus($hperid)
    {
        $model = Hperson::findOne($hperid);
        $civilstatus="";
        if($model->patcstat == 'C')
            {
                $civilstatus = 'Child';
            }
        elseif ($model->patcstat == 'D')
            {
                $civilstatus = 'Divorce';
            }
        elseif ($model->patcstat == 'M')
            {
                $civilstatus = 'Married';
            }
            
        elseif ($model->patcstat == 'N')
            {
                $civilstatus = 'Not Applicable';
            }
            
       elseif ($model->patcstat == 'X')
            {
                $civilstatus = 'Separated';
            }
       
       elseif ($model->patcstat == 'S')
            {
                $civilstatus = 'Single';
            }
            
       elseif ($model->patcstat == 'W')
            {
                $civilstatus = 'Widow/Widower';
            }
       else 
       {
           $civilstatus = 'None';
       }
            
        return $civilstatus;
        
    }
    
    
    static  function Age($encid)
    {
        $model = Hadmlog::findOne($encid);
        
        $age = "";
        if(intval($model->patage)>0)
        {
            $age = intval($model->patage).' yr/s';
        }
        
        else if (intval($model->patagemo)>0)
        {
            $age = intval($model->patagemo).' mo/s';
        }
        
        else if (intval($model->patagedy)>0)
        {
            $age = intval($model->patagedy).' day/s';
        }
        
        else
        {
            $age = intval($model->patagehr).' hr/s old';
        }
        
        return $age;
        
    }
    
    
    
    static  function Room($encid)
    {
        //****** Room
        $room = "";
        $modelhpatroom = Hpatroom::find()
        ->where(['enccode' =>  $encid])
        ->andFilterWhere(['patrmstat' => 'A'])
        ->one();
        
        if($modelhpatroom != NULL)
        {
            $modelward = Hward::find()
            ->where(['wardcode' =>  $modelhpatroom->wardcode])
            ->andFilterWhere(['wardstat' => 'A'])
            ->one();
            
            
            if($modelward != NULL )
            {
                
                //get the rmintkey to query in hroom
                $rmintkey = substr($modelhpatroom->rmintkey,strlen($modelhpatroom->wardcode));
                
                $modelhroom = Hroom::find()
                ->where(['rmcode' =>  $rmintkey])
                ->andWhere(['wardcode' =>  $modelhpatroom->wardcode])
                ->one();
                
                $room = $modelward->wardname.' - '.$modelhroom->rmname;
            }
            
            
            
        }
        else {
            $room = "No Room";
        }
            
            return $room;
    }
    
        
    


}