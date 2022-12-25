<?php
namespace app\models;
use yii\db\ActiveRecord;

class Pages extends ActiveRecord
{
    public static function tableName()
    {	
        return 'pages';
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Загловок',
            'content' => 'Текст',
        ];
    }

    public function rules()
    {
        return [
            [['title'],'required'],
            ['title','string', 'length'=>[1,40]],
            ['content', 'trim'],
        ];
    }
}




?>