<?php

use common\controllers\Cf4Controller;
use common\controllers\PatiendetailsController;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\controllers\ValidateController;
use common\models\Hcrsward;
use common\models\Hdocord;
use common\models\Henctr;
use common\models\Hadmlog;
use common\models\Herlog;

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 */

$this->title = PatiendetailsController::Fullname($model->hpercode)." Discharge Clearance";
$this->params['breadcrumbs'][] = ['label' => 'Hpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hperson-view">
    <div class="card">
        <div class="card-header">
           <?php 
           //if(ValidateController::Patientinformation($model->hpercode) == TRUE)
           //{echo Html::a('Print', ['print', 'hpercode' => $model->hpercode], ['class' => 'btn btn-success']);}
           ?>
        </div>
        <div class="card-body">
        
        <h3>Finag Diagnosis and ICD Code</h3>
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [

                    [
                        'label'=>'Final Diagnosis',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  PatiendetailsController::FinalDiagnosis($model->enccode);
                        },
                        'contentOptions' => ['class' => (ValidateController::FinalDiagnosis($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    
                     
                     [
                         'label'=>'ICD Code',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  PatiendetailsController::ICDCode($model->enccode);
                         },
                         'contentOptions' => ['class' => (ValidateController::ICDCode($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],        
                     ],        
                ],
            ]) ?>
            
            <div>
            <br><br>
            <h3>Ancilliary Department</h3>
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label'=>'Laboratory',
                        
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return  PatiendetailsController::PatientLaboratory($model->enccode);
                               
                        },
                        'contentOptions' => ['class' => (ValidateController::PatientLaboratory($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    
                     
                     [
                         'label'=>'Radiology',
                         'format'=>'raw',
                         'value' => function($model)
                         {
                             return  PatiendetailsController::PatientRadiology($model->enccode);
                         },
                         'contentOptions' => ['class' => (ValidateController::PatientRadiology($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],        
                     ],        
                ],
            ]) ?>
            </div>
            
            <br><br>
            <div>
            <h3>Claim Form 4</h3>
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label'=>'[Admission/Complaint/History] - [Chief Complain]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::Chiefcomplaint($model->enccode);
                        },
                        'contentOptions' => [
                            'style' => 'width:50%; white-space: normal;',
                            'class' => (ValidateController::Chiefcomplaint($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    [
                        'label'=>'[Admission/Complaint/History] - [Admission Diagnosis]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::AdmissionDiagnosis($model->enccode);
                        },
                        'contentOptions' => [
                        'style' => 'width:50%; white-space: normal;',
                        'class' => (ValidateController::AdmissionDiagnosis($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    [
                        'label'=>'[Admission/Complaint/History] - [History of Present Illness]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::HistoryPresentIllness($model->enccode);
                        },
                        'contentOptions' => [
                            'style' => 'width:50%; white-space: normal;',
                            'class' => (ValidateController::HistoryPresentIllness($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                        ],
                    [
                        'label'=>'[Admission/Complaint/History] - [Permanent Past Medical History]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::PermanentPastMedicalHistory($model->enccode);
                        },
                        'contentOptions' => [
                        'style' => 'width:50%; white-space: normal;',
                            'class' => (ValidateController::PermanentPastMedicalHistory($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    [
                        'label'=>'[Admission/Complaint/History] - [OB/GYN History]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::ObgynHistory($model->enccode);
                        },
                        'contentOptions' => [
                            'style' => 'width:50%; white-space: normal;'
                            //'class' => (ValidateController::ObgynHistory($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                            ],
                    ],    
                    [
                        'label'=>'[Pertinent Signs & Symptoms]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::PertinentSignsAndSymptoms($model->enccode);
                        },
                        'contentOptions' => [
                            'style' => 'width:50%; white-space: normal;',
                            'class' => (ValidateController::PertinentSignsAndSymptoms($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    
                    
                    
                    [
                        'label'=>'[Physical Examination]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::PhysicalExamination($model->enccode);
                        },
                        'contentOptions' => [
                            'style' => 'width:50%; overflow: auto; word-wrap: break-word;',
                            'class' => (ValidateController::PhysicalExamination($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                    ],
                    
                    
                    [
                        'label'=>'[Course in the Ward]',
                        'format'=>'raw',
                        'value' => function($model)
                        {
                            return Cf4Controller::CourseInTheWardDischarge($model->enccode);

                        },
                        'contentOptions' => [
                        'style' => 'width:50%; overflow: auto; word-wrap: break-word;',
                        'class' => (ValidateController::CourseInTheWardDischarge($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                        ],
                    
    
                    
                ],
            ]) 
            ?>
            </div>
            
            
            
        </div>
        
    </div>
</div>

<?php 
/*
$modelenctr = Henctr::find()->where(['enccode'=>$model->enccode])->one();
$modelcrsward = Hcrsward::find()->where(['enccode'=>$model->enccode])->all();

if($modelenctr->toecode == 'ADM')
{
    $m = Hadmlog::find()->where(['enccode'=>$model->enccode])->one();
    $admdate =strtotime(substr($m->admdate, 0,10)) ;
    $disdate =strtotime(substr($m->disdate, 0,10)) ;
}
elseif ($modelenctr->toecode == 'ER')
{
    $m = Herlog::find()->where(['enccode'=>$model->enccode])->one();
    $admdate = strtotime(substr($m->erdate, 0,10))  ;
    $disdate = strtotime(substr($m->erdtedis, 0,10));
}


$totaldays = ($disdate - $admdate)/60/60/24;
$currentdate = $m->admdate;
for ($x = 0; $x <= $totaldays; $x++) {
    echo date('Y-m-d', strtotime($currentdate . ' +'.$x.' day'))." - ";
    echo Cf4Controller::CourseInTheWardDate($model->enccode,date('Y-m-d', strtotime($currentdate . ' +'.$x.' day')))."<br>";
}
*/


        $modelx = Hdocord::find()
        ->where(['orcode'=>'LABOR'])
        ->andFilterWhere(['enccode'=>$model->enccode])
        ->andFilterWhere(['dostat'=>'A'])
        ->andFilterWhere(['or', 'pcchrgcod=""', 'pcchrgcod is null'])
        ->all();
        
       
        foreach ($modelx as $id => $participants) {  
            echo $participants['enccode'] . "<br>";
           
        }
 
?>
