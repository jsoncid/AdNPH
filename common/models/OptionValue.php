<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "option_value".
 *
 * @property int $id
 * @property int $rf_id
 * @property string $name
 * @property int $sort_order
 * @property int $pdf_id
 *
 * @property PhoLabresult1 $model
 */
class OptionValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public static function tableName()
    {
        return 'option_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rf_id', 'sort_order', 'pdf_id'], 'safe'],
            [['rf_id', 'sort_order', 'pdf_id'], 'integer'],
            [['name', ], 'string', 'max' => 128],
            [['path'], 'string', 'max' => 1024],
            [['rf_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhoLabresult1::class, 'targetAttribute' => ['rf_id' => 'rf_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rf_id' => 'rf_id',
            'name' => 'Name',
            'sort_order' => 'Sort Order',
            'pdf_id' => 'Pdf ID',
        ];
    }

    /**
     * Gets query for [[OptionValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPholabresult1()
    {
        return $this->hasOne(PhoLabresult1::class, ['rf_id' => 'rf_id']);
    }
    
    
  



    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass();
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
     
        $models   = [];
        
        if ($post && is_array($post)) {
            foreach ($post as $i => $modelsoption) {
                if (isset($modelsoption['id']) && isset($multipleModels[$modelsoption['id']]) && !empty($multipleModels[$modelsoption['id']])) {
                    $models[] = $multipleModels[$modelsoption['id']];
                } else {
                    $models[] = new $modelClass();
                }
            }
        }
        
        // set attributes for all models
        if ($models) {
            foreach ($models as $i => $modelOptionValue) {
                $modelOptionValue->attributes = $post[$i];
                $index = ($modelOptionValue->isNewRecord) ? $i : $modelOptionValue->id;
                $modelOptionValue->path = \yii\web\UploadedFile::getInstances($modelOptionValue, "[{$index}]path");
            }
        }
        
        unset($model, $formName, $post);
        return $models;
    }
  
    
}
    
    
    
    
    /*public static function createMultiple($modelClass, $multipleModels= [])
    {
        

        $model    = new $modelClass();
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];
        
    
        if ($post && is_array($post)) {
            foreach ($post as $i => $modelsoption) {
                if (isset($multipleModels[$modelsoption['id']]) && !empty($multipleModels[$modelsoption['id']])) {
                    $models  [] = $multipleModels[$modelsoption['id']];
                } else {
                    $models  [] = new $modelClass();
                }
            }
        }
        
        unset($model, $formName, $post);
        
        return  $models  ;
    }
}*/
