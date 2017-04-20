<?php


namespace app\models;
use app\modules\admin\models\Review;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id'=>'category_id']);
    }

    public function getReviews(){
        return $this->hasMany(Review::className(), ['product_id'=>'id'])->where(['=','active',1])->orderBy('date DESC');
    }
}