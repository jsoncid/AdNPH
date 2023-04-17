<?php

namespace common\controllers;


use common\models\Hadmlog;
use common\models\Hcrsward;
use common\models\Henctr;
use common\models\Hmrhisto;
use common\models\Hperson;
use common\models\Hpesignsothers;
use common\models\Hphyexam;
use common\models\Hsignsymptoms;
use common\models\Htelep;
use common\models\Hvitalsign;
use common\models\Hvsothr;
use yii\web\Controller;
use common\models\Hbrgy;



/**
 * HdocordController implements the CRUD actions for Hdocord model.
 */
class ValidateController extends Controller
{
    /*******************************************************  patient information validation ******************/
    static  function Patientinformation($hperid)
    {
       if(
           ValidateController::Fullname($hperid)== TRUE &&
           ValidateController::Sex($hperid)== TRUE &&
           ValidateController::Dateofbirth($hperid)== TRUE &&
           ValidateController::Address($hperid)== TRUE &&
           ValidateController::Zipcode($hperid)== TRUE &&
           ValidateController::Civilstatus($hperid)== TRUE &&
           ValidateController::Nationality($hperid)== TRUE &&
           ValidateController::Contact($hperid)== TRUE &&
           ValidateController::Contactfullname($hperid)== TRUE &&
           ValidateController::Contactaddress($hperid)== TRUE &&
           ValidateController::Contactcellno($hperid)== TRUE &&
           ValidateController::Contactrelation($hperid)== TRUE
           ){return TRUE;}
       else{return FALSE;}
    }

            static  function Fullname($hperid)
            {
                $model = Hperson::findOne($hperid);
                
                if($model->patlast == null || $model->patfirst == null){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Sex($hperid)
            {
                $model = Hperson::findOne($hperid);
                
                if($model->patsex == null){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Dateofbirth($hperid)
            {
                $model = Hperson::findOne($hperid);
                if(str_contains($model->patbdate, "0000") == TRUE ){return FALSE;}
                else{return TRUE;}
            }
            
            
            static  function Address($hperid)
            {
                $model = Hperson::findOne($hperid);
                $modelbrg = Hbrgy::findOne($model->haddr->brg);
                if($modelbrg == null || $model->haddr->patstr == null){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Zipcode($hperid)
            {
                $model = Hperson::findOne($hperid);
                if($model->haddr->patzip == null){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Contact($hperid)
            {
                $modelcontact = Htelep::find()->where(['hpercode' => $hperid])->one();
                if($modelcontact == null){return FALSE;}
                else{return TRUE;}      
            }
            
            static  function Civilstatus($hperid)
            {
                $model = Hperson::findOne($hperid);
                if($model->patcstat == null){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Nationality($hperid)
            {
                $model = Hperson::findOne($hperid);
                if($model->natcode == null){return FALSE;}
                else{return TRUE;}
            }
            
            
            static  function Contactfullname($hperid)
            {
                $model = Hperson::findOne($hperid);
                
                if($model->patemernme == null ){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Contactaddress($hperid)
            {
                $model = Hperson::findOne($hperid);
                
                if($model->patemaddr == null ){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Contactcellno($hperid)
            {
                $model = Hperson::findOne($hperid);
                
                if($model->pattelno == null ){return FALSE;}
                else{return TRUE;}
            }
            
            static  function Contactrelation($hperid)
            {
                $model = Hperson::findOne($hperid);
                
                if($model->relemacode == null ){return FALSE;}
                else{return TRUE;}
            }
    
    /*******************************************************  patient information validation ******************/
    
    
    
    
    /*******************************************************  cf4 validation ******************/
            
            static  function cf4($enccode)
            {
                if(
                    ValidateController::Chiefcomplaint($enccode)== TRUE &&
                    ValidateController::AdmissionDiagnosis($enccode)== TRUE &&
                    ValidateController::HistoryPresentIllness($enccode)== TRUE &&
                    ValidateController::PermanentPastMedicalHistory($enccode)== TRUE &&
                    ValidateController::PertinentSignsAndSymptoms($enccode)== TRUE &&
                    ValidateController::PhysicalExamination($enccode)== TRUE &&
                    ValidateController::CourseInTheWardEr($enccode)== TRUE
                    ){return TRUE;}
                    else{return FALSE;}
            }
            
            
            
            
            
            
            static  function Chiefcomplaint($enccode)
            {
                $model = Hmrhisto::find()->where(['enccode'=>$enccode])->andFilterWhere(['histype'=>'COMPL'])->one();
                if($model != null){return TRUE;} else{return FALSE;}
            }
            
            static  function AdmissionDiagnosis($enccode)
            {
                $model = Hadmlog::find()->where(['enccode'=>$enccode])->one();
                if($model->admtxt != null){return TRUE;} else{return FALSE;}
            }
            
            static  function HistoryPresentIllness($enccode)
            {
                $model = Hmrhisto::find()->where(['enccode'=>$enccode])->andFilterWhere(['histype'=>'PRHIS'])->one();
                if($model != null){return TRUE;} else{return FALSE;}
            }
            
            static  function PermanentPastMedicalHistory($enccode)
            {
                $model = Hmrhisto::find()->where(['enccode'=>$enccode])->andFilterWhere(['histype'=>'PAHIS'])->one();
                if($model != null){return TRUE;} else{return FALSE;}
            }
            
            static  function PertinentSignsAndSymptoms($enccode)
            {
                
                $model = Hsignsymptoms::find()->where(['enccode'=>$enccode])->one();
                $model2 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'painsite'])->one();
                $model3 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'others'])->one();
                $desc = NULL;  
                
                
                if($model != NULL)
                {
                    $attribs = $model->attributeLabels();
                    $attribs = array_splice($attribs,5);
                    
                    foreach ($attribs as $index => $attrib) {
                        if($model->$index != NULL)
                        {
                            $desc = $desc.$attrib.",";
                        }
                    }
                }

                if($model2 != null){$desc = $desc."Pain Site: ".$model2->remarks.", ";}
                if($model3 != null){$desc = $desc."Others: ".$model3->remarks.",";}
                
                if($desc != null){return TRUE;} else{return FALSE;}
            }
            
            
            static  function PhysicalExamination($enccode)
            {
                $model = Hphyexam::find()->where(['enccode'=>$enccode])->one();
                $model2 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'alteredsensorium'])->one();
                $model3 = Hvsothr::find()->where(['enccode'=>$enccode])->one();
                $model4 = Hvitalsign::find()->where(['enccode'=>$enccode])->one();
                $model5 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'heent_others'])->one();
                $model6 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'cl_others'])->one();
                $model7 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'cvs_others'])->one();
                $model8 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'abd_others'])->one();
                $model9 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'guie_others'])->one();
                $model10 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'skinex_others'])->one();
                $model11 = Hpesignsothers::find()->where(['enccode'=>$enccode])->andFilterWhere(['pesigntype'=>'neuro_others'])->one();
                
                $gn = NULL;
                if($model != null)
                {
                    if($model->awakealert == "Y")
                    {
                        $gn = $gn.$model->getAttributeLabel('awakealert')."<br>";
                    }
                    else
                    {
                        if($model2 != null){$gn = $gn."Altered sensorium: ".$model2->remarks."<br>";}
                    }
                }
                
                $vs = NULL;
                if($model3 != null)
                {
                    if($model3->vsheight != null){$vs = $vs."Height: ".$model3->vsheight."cm<br>";}
                    if($model3->vsheight != null){$vs = $vs."Weight: ".$model3->vsweight."kg<br>";}
                }
                
                if($model4 != null)
                {
                    if($model4->vsbp != null){$vs = $vs."BP: ".$model4->vsbp."<br>";}
                    if($model4->vspulse != null){$vs = $vs."HR: ".$model4->vspulse."<br>";}
                    if($model4->vsresp != null){$vs = $vs."RR: ".$model4->vsresp."<br>";}
                    if($model4->vstemp != null){$vs = $vs."TEMP: ".$model4->vstemp."<br>";}
                }
                
                $heent = NULL;
                if($model != null)
                {
                    if($model->heent_essentiallynormal != null && $model->heent_essentiallynormal > 0 ){$heent = $heent.$model->getAttributeLabel('heent_essentiallynormal')."<br>";}
                    if($model->heent_abnopupireact != null && $model->heent_abnopupireact > 0 ){$heent = $heent.$model->getAttributeLabel('heent_abnopupireact')."<br>";}
                    if($model->heent_cervlympadeno != null && $model->heent_cervlympadeno > 0 ){$heent = $heent.$model->getAttributeLabel('heent_cervlympadeno')."<br>";}
                    if($model->heent_drymucousmembrane != null && $model->heent_drymucousmembrane > 0 ){$heent = $heent.$model->getAttributeLabel('heent_drymucousmembrane')."<br>";}
                    if($model->heent_ictericsclerae != null && $model->heent_ictericsclerae > 0 ){$heent = $heent.$model->getAttributeLabel('heent_ictericsclerae')."<br>";}
                    if($model->heent_paleconjunctivae != null && $model->heent_paleconjunctivae > 0 ){$heent = $heent.$model->getAttributeLabel('heent_paleconjunctivae')."<br>";}
                    if($model->heent_sunkeneyeballs != null && $model->heent_sunkeneyeballs > 0 ){$heent = $heent.$model->getAttributeLabel('heent_sunkeneyeballs')."<br>";}
                    if($model->heent_sunkenfontanelle != null && $model->heent_sunkenfontanelle > 0 ){$heent = $heent.$model->getAttributeLabel('heent_sunkenfontanelle')."<br>";}
                }
                if($model5 != null){$heent = $heent."Others: ".$model5->remarks."<br>";}
                
                
                
                $chestlungs = NULL;
                if($model != null)
                {
                    if($model->cl_essentiallynormal != null && $model->cl_essentiallynormal > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_essentiallynormal')."<br>";}
                    if($model->cl_asymchestexpansion != null && $model->cl_asymchestexpansion > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_asymchestexpansion')."<br>";}
                    if($model->cl_decbreathsounds != null && $model->cl_decbreathsounds > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_decbreathsounds')."<br>";}
                    if($model->cl_wheezes != null && $model->cl_wheezes > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_wheezes')."<br>";}
                    if($model->cl_lumpoverbreast != null && $model->cl_lumpoverbreast > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_lumpoverbreast')."<br>";}
                    if($model->cl_ralescracklesrhonchi != null && $model->cl_ralescracklesrhonchi > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_ralescracklesrhonchi')."<br>";}
                    if($model->cl_interribclaretract != null && $model->cl_interribclaretract > 0 ){$chestlungs = $chestlungs.$model->getAttributeLabel('cl_interribclaretract')."<br>";}
                }
                if($model6 != null){$chestlungs = $chestlungs."Others: ".$model6->remarks."<br>";}
                
                
                $cvs = NULL;
                if($model != null)
                {
                    if($model->cvs_essentiallynormal != null && $model->cvs_essentiallynormal > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_essentiallynormal')."<br>";}
                    if($model->cvs_disapexbeat != null && $model->cvs_disapexbeat > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_disapexbeat')."<br>";}
                    if($model->cvs_heavesthrills != null && $model->cvs_heavesthrills > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_heavesthrills')."<br>";}
                    if($model->cvs_pericarbulge != null && $model->cvs_pericarbulge > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_pericarbulge')."<br>";}
                    if($model->cvs_irregularrhythm != null && $model->cvs_irregularrhythm > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_irregularrhythm')."<br>";}
                    if($model->cvs_muffledheartsounds != null && $model->cvs_muffledheartsounds > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_muffledheartsounds')."<br>";}
                    if($model->cvs_murmur != null && $model->cvs_murmur > 0 ){$cvs = $cvs.$model->getAttributeLabel('cvs_murmur')."<br>";}
                }
                if($model7 != null){$cvs = $cvs."Others: ".$model7->remarks."<br>";}
                
                
                $abdomen = NULL;
                if($model != null)
                {
                    if($model->abd_essentiallynormal != null && $model->abd_essentiallynormal > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_essentiallynormal')."<br>";}
                    if($model->abd_abdrigidity != null && $model->abd_abdrigidity > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_abdrigidity')."<br>";}
                    if($model->abd_abdtenderness != null && $model->abd_abdtenderness > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_abdtenderness')."<br>";}
                    if($model->abd_hyperbowelsounds != null && $model->abd_hyperbowelsounds > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_hyperbowelsounds')."<br>";}
                    if($model->abd_palpablemass != null && $model->abd_palpablemass > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_palpablemass')."<br>";}
                    if($model->abd_tympdullabdomen != null && $model->abd_tympdullabdomen > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_tympdullabdomen')."<br>";}
                    if($model->abd_uterinecontraction != null && $model->abd_uterinecontraction > 0 ){$abdomen = $abdomen.$model->getAttributeLabel('abd_uterinecontraction')."<br>";}
                }
                if($model8 != null){$abdomen = $abdomen."Others: ".$model8->remarks."<br>";}
                
                
                
                $guie = NULL;
                if($model != null)
                {
                    if($model->guie_essentiallynormal != null && $model->guie_essentiallynormal > 0 ){$guie = $guie.$model->getAttributeLabel('guie_essentiallynormal')."<br>";}
                    if($model->guie_bldstainedinexamfinger != null && $model->guie_bldstainedinexamfinger > 0 ){$guie = $guie.$model->getAttributeLabel('guie_bldstainedinexamfinger')."<br>";}
                    if($model->guie_cervicaldilatation != null && $model->guie_cervicaldilatation > 0 ){$guie = $guie.$model->getAttributeLabel('guie_cervicaldilatation')."<br>";}
                    if($model->guie_presenceabnodis != null && $model->guie_presenceabnodis > 0 ){$guie = $guie.$model->getAttributeLabel('guie_presenceabnodis')."<br>";}
                    
                }
                if($model9 != null){$guie = $guie."Others: ".$model9->remarks."<br>";}
                
                
                $skin = NULL;
                if($model != null)
                {
                    if($model->skinex_essentiallynormal != null && $model->skinex_essentiallynormal > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_essentiallynormal')."<br>";}
                    if($model->skinex_clubbing != null && $model->skinex_clubbing > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_clubbing')."<br>";}
                    if($model->skinex_coldclammyskin != null && $model->skinex_coldclammyskin > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_coldclammyskin')."<br>";}
                    if($model->skinex_cyanosismottledskin != null && $model->skinex_cyanosismottledskin > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_cyanosismottledskin')."<br>";}
                    if($model->skinex_edemaswelling != null && $model->skinex_edemaswelling > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_edemaswelling')."<br>";}
                    if($model->skinex_decmobility != null && $model->skinex_decmobility > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_decmobility')."<br>";}
                    if($model->skinex_palenailbeds != null && $model->skinex_palenailbeds > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_palenailbeds')."<br>";}
                    if($model->skinex_poorskinturgor != null && $model->skinex_poorskinturgor > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_poorskinturgor')."<br>";}
                    if($model->skinex_rashespetechiae != null && $model->skinex_rashespetechiae > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_rashespetechiae')."<br>";}
                    if($model->skinex_weakpulses != null && $model->skinex_weakpulses > 0 ){$skin = $skin.$model->getAttributeLabel('skinex_weakpulses')."<br>";}
                }
                if($model10 != null){$skin = $skin."Others: ".$model10->remarks."<br>";}
                
                
                $neuro = NULL;
                if($model != null)
                {
                    if($model->skinex_essentiallynormal != null && $model->skinex_essentiallynormal > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_essentiallynormal')."<br>";}
                    if($model->skinex_clubbing != null && $model->skinex_clubbing > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_clubbing')."<br>";}
                    if($model->skinex_coldclammyskin != null && $model->skinex_coldclammyskin > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_coldclammyskin')."<br>";}
                    if($model->skinex_cyanosismottledskin != null && $model->skinex_cyanosismottledskin > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_cyanosismottledskin')."<br>";}
                    if($model->skinex_edemaswelling != null && $model->skinex_edemaswelling > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_edemaswelling')."<br>";}
                    if($model->skinex_decmobility != null && $model->skinex_decmobility > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_decmobility')."<br>";}
                    if($model->skinex_palenailbeds != null && $model->skinex_palenailbeds > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_palenailbeds')."<br>";}
                    if($model->skinex_poorskinturgor != null && $model->skinex_poorskinturgor > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_poorskinturgor')."<br>";}
                    if($model->skinex_rashespetechiae != null && $model->skinex_rashespetechiae > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_rashespetechiae')."<br>";}
                    if($model->skinex_weakpulses != null && $model->skinex_weakpulses > 0 ){$neuro = $neuro.$model->getAttributeLabel('skinex_weakpulses')."<br>";}
                }
                if($model11 != null){$neuro = $neuro."Others: ".$model11->remarks."<br>";}
                
                if($gn != null && $vs != null && $heent != null && $chestlungs != null && $cvs != null && $abdomen != null && $guie != null && $skin != null && $neuro != null)
                { return true; } else { return false;}
                //return $gn.$vs.$heent.$chestlungs.$cvs.$abdomen.$guie.$skin.$neuro;
            }
            
            
            
            static  function CourseInTheWardEr($enccode)
            {
                $modelenc = Henctr::find()->where(['enccode'=>$enccode])->one();
                $modelenc->encdate = substr($modelenc->encdate, 0, 10);
                $model = Hcrsward::find()->where(['enccode'=>$enccode])->andWhere(['like', 'dtetake', $modelenc->encdate])->one();
                                
                if($model != null)
                { return true; } else { return false;}
            }
            
            
            
    /*******************************************************  cf4 validation ******************/


}