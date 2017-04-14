<?php


namespace app\controllers;
use app\models\Product;
use Yii;

class ProductController extends AppController
{
    public function actionView($id){
//        $id = Yii::$app->request->get('id');

        //Ленивая
        $product = Product::findOne($id);

        if(empty($product)){
            throw new \yii\web\HttpException(404, 'Такого товара не существует');
        }


        //Жадная
        //$product = Product::find()->with('category')->where(['id'=>$id])->limit(1)->one();
        $hits = Product::find()->where(['hit'=>'1'])->limit(6)->all();

        $this->setMeta(\Yii::$app->params['siteName']." | ".$product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product','hits'));
    }
}