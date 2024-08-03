<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['id'], 'integer'], // Add this line
            [['created_at', 'updated_at'], 'safe'], // Ensure these fields exist if used
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'id' => 'ID', // Add this line
        ];
    }
}
