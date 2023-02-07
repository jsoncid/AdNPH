<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hpersonal".
 *
 * @property string $employeeid
 * @property string $lastname
 * @property string $firstname
 * @property string|null $middlename
 * @property string|null $maidenname
 * @property string|null $updsw
 * @property string|null $datemod
 * @property string|null $emplock
 * @property string|null $empstat
 * @property string|null $postitle
 * @property string|null $paddr
 * @property string|null $empsuffix
 * @property string|null $empprefix
 * @property string|null $tin
 * @property string|null $deptcode
 * @property string|null $entryby
 * @property string|null $provbdate
 * @property string|null $provsex
 * @property string|null $contactno
 *
 * @property CommunityLog[] $communityLogs
 * @property Docsoap[] $docsoaps
 * @property Hadmlog[] $hadmlogs
 * @property Hdocord[] $hdocords
 * @property Hdocord[] $hdocords0
 * @property Hdocord[] $hdocords1
 * @property Henctr[] $henctrs
 * @property Hperson[] $hpeople
 * @property Hprovider[] $hproviders
 * @property Hrqd[] $hrqds
 * @property Hrqd[] $hrqds0
 * @property Hrxo[] $hrxos
 * @property Hrxo[] $hrxos0
 */
class Hpersonal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hpersonal';
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
            [['employeeid'], 'required'],
            [['datemod', 'provbdate'], 'safe'],
            [['employeeid', 'deptcode', 'entryby'], 'string', 'max' => 10],
            [['lastname', 'firstname', 'middlename', 'maidenname', 'contactno'], 'string', 'max' => 50],
            [['updsw', 'emplock', 'empstat', 'provsex'], 'string', 'max' => 1],
            [['postitle'], 'string', 'max' => 60],
            [['paddr'], 'string', 'max' => 155],
            [['empsuffix', 'empprefix'], 'string', 'max' => 5],
            [['tin'], 'string', 'max' => 20],
            [['employeeid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employeeid' => 'Employeeid',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'maidenname' => 'Maidenname',
            'updsw' => 'Updsw',
            'datemod' => 'Datemod',
            'emplock' => 'Emplock',
            'empstat' => 'Empstat',
            'postitle' => 'Postitle',
            'paddr' => 'Paddr',
            'empsuffix' => 'Empsuffix',
            'empprefix' => 'Empprefix',
            'tin' => 'Tin',
            'deptcode' => 'Deptcode',
            'entryby' => 'Entryby',
            'provbdate' => 'Provbdate',
            'provsex' => 'Provsex',
            'contactno' => 'Contactno',
        ];
    }

    /**
     * Gets query for [[CommunityLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommunityLogs()
    {
        return $this->hasMany(CommunityLog::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Docsoaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocsoaps()
    {
        return $this->hasMany(Docsoap::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hadmlogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHadmlogs()
    {
        return $this->hasMany(Hadmlog::className(), ['admclerk' => 'employeeid']);
    }

    /**
     * Gets query for [[Hdocords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords()
    {
        return $this->hasMany(Hdocord::className(), ['entby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hdocords0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords0()
    {
        return $this->hasMany(Hdocord::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hdocords1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHdocords1()
    {
        return $this->hasMany(Hdocord::className(), ['verby' => 'employeeid']);
    }

    /**
     * Gets query for [[Henctrs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHenctrs()
    {
        return $this->hasMany(Henctr::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hpeople]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHpeople()
    {
        return $this->hasMany(Hperson::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hproviders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHproviders()
    {
        return $this->hasMany(Hprovider::className(), ['employeeid' => 'employeeid']);
    }

    /**
     * Gets query for [[Hrqds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds()
    {
        return $this->hasMany(Hrqd::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hrqds0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrqds0()
    {
        return $this->hasMany(Hrqd::className(), ['verby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hrxos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxos()
    {
        return $this->hasMany(Hrxo::className(), ['entryby' => 'employeeid']);
    }

    /**
     * Gets query for [[Hrxos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHrxos0()
    {
        return $this->hasMany(Hrxo::className(), ['rxorefno' => 'employeeid']);
    }
}
