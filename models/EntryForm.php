<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $name = ['111', '222'];
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}
