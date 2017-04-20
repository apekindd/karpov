<?php


namespace app\controllers;
use app\models\Product;
use app\modules\admin\models\Review;
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

        $this->setMeta($product->name.' | '.\Yii::$app->params['siteName'], $product->keywords, $product->description);

        return $this->render('view', compact('product','hits'));
    }

    public function actionReview(){
        if(Yii::$app->request->isPost){
            $id = (int)$_POST['product'];
            $email = trim(strip_tags($_POST['email']));
            $name = trim(strip_tags($_POST['name']));
            $message = trim(strip_tags($_POST['message']));
            if($id>0 && filter_var($email, FILTER_VALIDATE_EMAIL) && $message != '' && $name != ''){
                $product = Product::findOne($id);
                if(!empty($product)){
                    $review = new Review();
                    $review->product_id = $id;
                    $review->name = $name;
                    $review->email = $email;
                    $review->message = $message;
                    $review->date = date('Y-m-d H:i:s');
                    $review->active = 0;
                    if($review->save()){
                        \Yii::$app->session->setFlash('success','Ваш комментарий отправлен на проверку модератором');
                        return $this->redirect(\Yii::$app->request->referrer,302);
                    }
                }
            }
        }
    }
}