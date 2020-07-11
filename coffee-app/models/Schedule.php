<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property string $email
 * @property time $coffee_time
 *
 */

class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id','email', 'coffee_time'], 'safe'],
            [['email', 'coffee_time'], 'required'],
            [['email'], 'string', 'max' => 255],
            ['email', 'email'],
            [['email'], 'unique', 'message' => 'Duplicate Email']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'coffee_time' => 'Coffee Time',
        ];
    }
}
