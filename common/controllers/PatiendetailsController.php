<?php

namespace common\controllers;

use Yii;
use common\models\Hbrgy;
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
use common\models\Hbed;


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
    
    static  function Address($hperid)
    {
        $model = Hperson::findOne($hperid);
        $modelbrg = Hbrgy::findOne($model->haddr->brg);
        if($modelbrg == null)
        {
            $address =  $model->haddr->patstr.', '.
                $model->haddr->hcity0->ctyname.', '.
                $model->haddr->hcity0->ctyprovcod0->provname.', '.
                $model->haddr->hcity0->ctyprovcod0->provreg0->regname; 
        }
        
        
        else{
        $address =  $model->haddr->patstr.', '.
                    $model->haddr->brg0->bgyname.', '.
                    $model->haddr->hcity0->ctyname.', '.
                    $model->haddr->hcity0->ctyprovcod0->provname.', '.
                    $model->haddr->hcity0->ctyprovcod0->provreg0->regname; 
        }
        return $address;
    }
    
    static  function Zipcode($hperid)
    {
        $model = Hperson::findOne($hperid);
        //return  $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle;
        $zipcode =  $model->haddr->patzip;
            return $zipcode;
    }
    
    
    static  function Religion($hperid)
    {
        $model = Hperson::findOne($hperid);
        //return  $model->patlast.' '.$model->patsuffix.', '.$model->patfirst.' '.$model->patmiddle;
        $zipcode =  $model->haddr->patzip;
        return $zipcode;
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
    
    static  function Agecurrent($encid)
    {
        $bday = new \DateTime('1995-05-22'); // Your date of birth
        $today = new \Datetime(date('Y-m-d'));
        $diff = $today->diff($bday);
        if($diff->y > 0){$age = $diff->y.' yr/s';}
        else{
             if($diff->m > 0){$age = $diff->m.' mo/s';}
             else {
                 if($diff->d > 0){$age = $diff->d.' day/s';}
             }
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
        
        $modelward = Hward::find()
        ->where(['wardcode' =>  $modelhpatroom->wardcode])
        ->andFilterWhere(['wardstat' => 'A'])
        ->one();
        
        $modelhroom = Hroom::find()
        ->where(['rmintkey' =>  $modelhpatroom->rmintkey])
        ->one();
        
        $modelbed = Hbed::find()
        ->where(['bdintkey' =>  $modelhpatroom->bdintkey])
        ->one();
        
        //$room = '['.$modelward->wardname.'] '.$modelhroom->rmname.' - '.$modelbed->bdname;
        $room = '['.$modelward->wardname.'] '.$modelhroom->rmname;
            return $room;
    }
    
        
    


}