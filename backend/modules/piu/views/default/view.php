<?php

use common\controllers\PatiendetailsController;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\controllers\ValidateController;

/**
 * @var yii\web\View $this
 * @var common\models\Hperson $model
 */

$this->title = $model->hpercode;
$this->params['breadcrumbs'][] = ['label' => 'Hpeople', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hperson-view">
    <div class="card">
        <div class="card-header">
           <?php 
           if(ValidateController::Patientinformation($model->hpercode) == TRUE)
           {echo Html::a('Print', ['print', 'hpercode' => $model->hpercode], ['class' => 'btn btn-success']);}
           ?>
        </div>
        <div class="card-body">
            <?php echo DetailView::widget([
                'model' => $model,
                'attributes' => [

                    'hpercode',
                    [
                        'label'=>'Patient Name',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  PatiendetailsController::Fullname($model->hpercode);
                        },
                        //'contentOptions' => ['class' => (ValidateController::Fullname($model->hpercode) == TRUE) ? 'bg-green' : 'bg-red'],
                        'contentOptions' => ['class' => (ValidateController::Fullname($model->hpercode) == TRUE) ? '' : 'bg-red'],
                    ],
                    [
                        'label'=>'Sex',
                        
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  $model->patsex;
                        },
                        'contentOptions' => ['class' => (ValidateController::Sex($model->hpercode) == TRUE) ? '' : 'bg-red'],
                    ],
                    [
                        'label'=>'Birth Date',
                        'format'=>'text',
                        'value' => function($model)
                        {
                            return  substr($model->patbdate,0,10);
                        },
                        'contentOptions' => ['class' => (ValidateController::Dateofbirth($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     [
                         'label'=>'Address',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  PatiendetailsController::Address($model->hpercode);
                         },
                         'contentOptions' => ['class' => (ValidateController::Address($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     [
                         'label'=>'Zipcode',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  PatiendetailsController::Zipcode($model->hpercode);
                            },
                            'contentOptions' => ['class' => (ValidateController::Zipcode($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     [
                         'label'=>'Civil Status',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  PatiendetailsController::Civilstatus($model->hpercode);
                        },
                        'contentOptions' => ['class' => (ValidateController::Civilstatus($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                    
                     [
                         'label'=>'Nationality',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return $model->natcode;
                        },
                        'contentOptions' => ['class' => (ValidateController::Nationality($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     
                     [
                         'label'=>'Contact #',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  PatiendetailsController::Contact($model->hpercode);
                        },
                        'contentOptions' => ['class' => (ValidateController::Contact($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     
                     
                     [
                         'label'=>'Contact Person`s Full Name',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  $model->patemernme;
                     },
                     'contentOptions' => ['class' => (ValidateController::Contactfullname($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     [
                         'label'=>'Contact Person`s Address',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  $model->patemaddr;
                     },
                     'contentOptions' => ['class' => (ValidateController::Contactaddress($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     [
                         'label'=>'Contact Person`s Contact No.',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  $model->pattelno;
                     },
                     'contentOptions' => ['class' => (ValidateController::Contactcellno($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                     [
                         'label'=>'Relation to Patient',
                         'format'=>'text',
                         'value' => function($model)
                         {
                             return  $model->relemacode;
                     },
                     'contentOptions' => ['class' => (ValidateController::Contactrelation($model->hpercode) == TRUE) ? '' : 'bg-red'],
                     ],
                     
                    
                    
                ],
            ]) ?>
            
            
        </div>
    </div>
</div>
