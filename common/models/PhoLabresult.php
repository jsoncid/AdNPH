<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "pho_labresult".
 *
 * @property int $rf_id
 * @property resource $file
 * @property string $date
 * @property int $added_by
 * @property int $rt_id
 * @property int $enccode
 *
 * @property PhoLabresultLogs[] $phoLabresultLogs
 * @property PhoLabresultLogs $rf
 */
class PhoLabresult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pho_labresult';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file','extensions'=>'pdf', 'maxFiles' => 4],
            [['date',], 'safe'],
            [['rt_id'], 'integer'],
            [['added_by','enccode', 'rt_id'], 'required'],
            [['added_by', 'enccode', 'remarks'], 'string'],
            [['rf_id'], 'exist', 'skipOnError' => true, 'targetClass' => PhoLabresultLogs::class, 'targetAttribute' => ['rf_id' => 'rf_id_logs']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Patient Name',
            'rf_id' => 'Reference ID',
            'file' => 'Laboratory Result',
            'date' => 'Date',
            'added_by' => 'Added By',
            'rt_id' => 'Rt ID',
            'remarks' => 'Remarks',
            
        ];
    }
    
    //delete this if wont work
    public function upload()
    {
        if ($this->validate()) {
            $fileNames = [];
            foreach ($this->file as $file) {
                $file_name = $this->enccode . '.' . $file->extension;
                $file->saveAs('upfiles/result/' . $file_name);
                $fileNames[] = $file_name;
               // $file->saveAs('upfiles/result' . $file->baseName . '.' . $file->extension);
            }
            return $fileNames;
        } else {
            return false;
        }
    }


    //end of delete this
    
    /**
     * Gets query for [[PhoLabresultLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhoLabresultLogs()
    {
        return $this->hasMany(PhoLabresultLogs::class, ['rf_id' => 'rf_id']);
    }

    /**
     * Gets query for [[Rf]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRf()
    {
        return $this->hasOne(PhoLabresultLogs::class, ['rf_id_logs' => 'rf_id']);
    }
}
