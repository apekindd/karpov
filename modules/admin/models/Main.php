<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "main".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 */
class Main extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['description','link'], 'string'],
            [['show'], 'integer'],
            [['title','seo_desc','keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'keywords' => 'Ключевый слова',
            'seo_desc' => 'Сео-описание',
            'image' => 'Картинка баннера',
            'link' => 'Ссылка на баннер',
            'show' => 'Показывать баннер',
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/'. $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
}
