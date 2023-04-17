<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hpesignsothers".
 *
 * @property string $enccode
 * @property string $datelog
 * @property string $timelog
 * @property string $pesigntype
 * @property string $remarks
 * @property string $datemod
 * @property string $entryby
 */
class Hpesignsothers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hpesignsothers';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enccode', 'datelog', 'timelog', 'pesigntype', 'datemod'], 'required'],
            [['datelog', 'timelog', 'datemod'], 'safe'],
            [['enccode'], 'string', 'max' => 48],
            [['pesigntype'], 'string', 'max' => 20],
            [['remarks'], 'string', 'max' => 255],
            [['entryby'], 'string', 'max' => 15],
            [['enccode', 'datelog', 'timelog', 'pesigntype'], 'unique', 'targetAttribute' => ['enccode', 'datelog', 'timelog', 'pesigntype']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enccode' => 'Enccode',
            'datelog' => 'Datelog',
            'timelog' => 'Timelog',
            'pesigntype' => 'Pesigntype',
            'remarks' => 'Remarks',
            'datemod' => 'Datemod',
            'entryby' => 'Entryby',
        ];
    }
}
