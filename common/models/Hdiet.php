<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hdiet".
 *
 * @property string $dietcode
 * @property string $dietdesc
 * @property string $dietstat
 * @property string $dietlock
 * @property string $updsw
 * @property string|null $dietdtmd
 * @property string|null $diettype
 */
class Hdiet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hdiet';
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
            [['dietcode'], 'required'],
            [['dietdtmd'], 'safe'],
            [['dietcode'], 'string', 'max' => 5],
            [['dietdesc'], 'string', 'max' => 50],
            [['dietstat', 'dietlock', 'updsw', 'diettype'], 'string', 'max' => 1],
            [['dietcode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dietcode' => 'Dietcode',
            'dietdesc' => 'Dietdesc',
            'dietstat' => 'Dietstat',
            'dietlock' => 'Dietlock',
            'updsw' => 'Updsw',
            'dietdtmd' => 'Dietdtmd',
            'diettype' => 'Diettype',
        ];
    }
}
