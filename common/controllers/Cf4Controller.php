<?php

namespace common\controllers;

use Yii;
use common\models\Hbrgy;
use common\models\Hdocord;
use common\models\Henctr;
use common\models\Hpatroom;
use common\models\Hprenatal;
use common\models\Hroom;
use common\models\Htelep;
use common\models\Hward;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Hadmlog;
use common\models\Hperson;
use common\models\Hbed;
use common\models\Hmrhisto;
use common\models\Hsignsymptoms;
use common\models\Hpesignsothers;
use common\models\Hphyexam;
use common\models\Hvsothr;
use common\models\Hvitalsign;
use common\models\Hcrsward;


/**
 * HdocordController implements the CRUD actions for Hdocord model.
 */
class Cf4Controller extends Controller
{

    static  function Chiefcomplaint($enccode)
    {
        $desc = "------";
        $model = Hmrhisto::find()->where(['enccode'=>$enccode])->andFilterWhere(['histype'=>'COMPL'])->one();
        if($model != null){$desc = $model->history;}
        return $desc;
    }
    
    static  function AdmissionDiagnosis($enccode)
    {
        $desc = "------";
        $model = Hadmlog::find()->where(['enccode'=>$enccode])->one();
        if($model->admtxt != null){$desc = $model->admtxt;}
        return $desc;
    }
    
    static  function HistoryPresentIllness($enccode)
    {
        $desc = "------";
        $model = Hmrhisto::find()->where(['enccode'=>$enccode])->andFilterWhere(['histype'=>'PRHIS'])->one();
        if($model != null){$desc = $model->history;}
        return $desc;
    }
        
    static  function PermanentPastMedicalHistory($enccode)
    {
        $desc = "------";
        $model = Hmrhisto::find()->where(['enccode'=>$enccode])->andFilterWhere(['histype'=>'PAHIS'])->one();
        if($model != null){$desc = $model->history;}
        return $desc;
    }
    
    static  function ObgynHistory($enccode)
    {
        $desc = "------";
        $model = Hprenatal::find()->where(['enccode'=>$enccode])->one();
        if($model != null)
        {
            $desc = "Pregnancy to Date-Gravidity: ".$model->ob_g."
                       <br>Delivery to Date-Parity: ".$model->ob_p."
                        <br>Full Term Pregnancy: ".$model->ob_t."
                        <br>Premature Pregnancy: ".$model->ob_p1."; Abortion: ".$model->ob_a."
                        <br>Living Children: ".$model->ob_l."
                        <br>LMP: ".$model->lmp;}
        return $desc;
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
                    $desc = $desc.$attrib."<br> ";
                }
            }
        } 
        
        
        if($model2 != null){$desc = $desc."Pain Site: ".$model2->remarks."<br>";}
        if($model3 != null){$desc = $desc."Others: ".$model3->remarks."<br>";}
        else {$desc = "------";}
  
        return $desc;
    }
    
    static  function PhysicalExamination($enccode)
    {
        $desc = NULL;
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
        $gn = $gn."General Survey: <br>";
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
        $vs = $vs."<br>Vital Signs: <br>";
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
        $heent = $heent."<br>HEENT: <br>";
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
        $chestlungs = $chestlungs."<br>CHEST/LUNGS: <br>";
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
        $cvs = $cvs."<br>CVS: <br>";
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
        $abdomen = $abdomen."<br>Abdomen: <br>";
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
        $guie = $guie."<br>GU(IE): <br>";
        if($model != null)
        {
            if($model->guie_essentiallynormal != null && $model->guie_essentiallynormal > 0 ){$guie = $guie.$model->getAttributeLabel('guie_essentiallynormal')."<br>";}
            if($model->guie_bldstainedinexamfinger != null && $model->guie_bldstainedinexamfinger > 0 ){$guie = $guie.$model->getAttributeLabel('guie_bldstainedinexamfinger')."<br>";}
            if($model->guie_cervicaldilatation != null && $model->guie_cervicaldilatation > 0 ){$guie = $guie.$model->getAttributeLabel('guie_cervicaldilatation')."<br>";}
            if($model->guie_presenceabnodis != null && $model->guie_presenceabnodis > 0 ){$guie = $guie.$model->getAttributeLabel('guie_presenceabnodis')."<br>";}
                        
        }
        if($model9 != null){$guie = $guie."Others: ".$model9->remarks."<br>";}
        
        
        $skin = NULL;
        $skin = $skin."<br>SKIN/EXTREMITIES: <br>";
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
        $neuro = $neuro."<br>NEURO-EXAM: <br>";
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
        
        return $gn.$vs.$heent.$chestlungs.$cvs.$abdomen.$guie.$skin.$neuro;
        //return $gn.$vs.$heent.$chestlungs.$cvs.$abdomen.$guie.$skin.$neuro;
    }
    
    
    static  function CourseInTheWardEr($enccode)
    {
        $modelenc = Henctr::find()->where(['enccode'=>$enccode])->one();
        $modelenc->encdate = substr($modelenc->encdate, 0, 10);
        $model = Hcrsward::find()->where(['enccode'=>$enccode])->andWhere(['like', 'dtetake', $modelenc->encdate])->one();
        $desc = null;
        
        if($model != null){$desc = $model->crseward;}
        //else {$desc = "------";}
        else {$desc = "No course in the ward on ".$modelenc->encdate;}
        
        return $desc;
    }


}