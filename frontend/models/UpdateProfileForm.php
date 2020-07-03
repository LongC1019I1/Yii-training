<?php


namespace frontend\models;


use yii\base\Model;

class UpdateProfileForm extends Model
{
    public $address;
    public $phone;
    public $birthday;

    public function rules()
    {
        return [
            [['address', 'phone', 'birthday'], 'safe']
        ];
    }

    public function strConcat()
    {
        return $this->address . ' ' . $this->phone . ' ' . $this->birthday;
    }

    public function saveData()
    {
        $model  = new UserProfile();
        $model->save();
    }
}