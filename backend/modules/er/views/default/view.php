<?php

use common\controllers\PatiendetailsController;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\controllers\ValidateController;
use common\controllers\Cf4Controller;
use common\models\Hsignsymptoms;

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 */

$this->title = PatiendetailsController::Fullname($model->hpercode);
//$this->title = $model->enccode;
$this->params['breadcrumbs'][] = ['label' => 'Hpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hperson-view">
    <div class="card">
        <div class="card-header">
           <?php 
           if(ValidateController::cf4($model->enccode) == TRUE)
           {echo Html::a('Print', ['print', 'hpercode' => $model->hpercode,'enccode' => $model->enccode,], ['class' => 'btn btn-success']);}
           ?>
        </div>
        <div class="card-body">
        <div>
            
            
            <div>
            <h2>Claim Form 4</h2>
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
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return Cf4Controller::CourseInTheWardEr($model->enccode);
                        },
                        'contentOptions' => [
                        'style' => 'width:50%; overflow: auto; word-wrap: break-word;',
                        'class' => (ValidateController::CourseInTheWardEr($model->enccode) == TRUE) ? 'bg-green' : 'bg-red'],
                        ],
                    
    
                    
                ],
            ]) 
            ?>
            </div>
        </div>
    </div>
   
</div>
