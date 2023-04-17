
<?php
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\FileInput;
use yii\web\JsExpression;
use yii\web\UploadedFile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use common\models\OptionValue;
use common\models\PhoLabresult1;
use yii\bootstrap4\ActiveForm;


/**
 * @var yii\web\View $this
 * @var common\models\PhoRadResult $model
 * @var common\models\PhoRadOptionValue $optionValues
 * @var yii\bootstrap4\ActiveForm $form
 */

//$optionValues = OptionValue::find()->where(['rf_id'=>$model->rf_id])->all(); // or you can populate the array with some data

?>
 
<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
<div class="panel-heading"><h3><i class="glyphicon glyphicon-envelope"></i> Type of Laboratory Result</h3></div>
<div class="panel-body">
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' =>$optionValues[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'pdf'
        ],
    ]); ?>
   <div class="container-items"><!-- widgetContainer -->
        <?php foreach ($optionValues as $i => $optionValue): ?>
        <div class="item panel panel-default">
            <div class="panel-heading">
                
                
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <?php
                // necessary for update action.
                if (! $optionValue->isNewRecord) {
                    echo Html::activeHiddenInput($optionValue, "[{$i}]id");
                }
                ?>
                <div class="row">
                    <div class="col-sm-6">
                                    <?= $form->field($optionValue, "[{$i}]name")->textInput([
                                         'maxlength' => true,
                                           'readonly' => true,
                                              ]) 
                                     ?>
                    </div>
                    <div class="col-sm-6">
                       <?php if ($optionValue->path): ?>
         <!--  <embed src="Url::to('@web/' . $optionValue->path) ?>" type="application/pdf" width="100%" height="500px" /> -->
       <?php echo Html::a('View Lab Result', ['../'.'/'.$optionValue->path], ['class' => 'btn btn-primary', 'target'=> '_blank',]) ?>
                          <?php endif; ?>
                           
                    </div>
                </div><!-- .row -->
            </div><!-- .panel-body -->
        </div><!-- .item -->
    <?php endforeach; ?>
    <?php DynamicFormWidget::end(); ?>
</div>
  

    <?php ActiveForm::end(); ?>

</div>