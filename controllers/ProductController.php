<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 02.01.2018
 * Time: 14:13
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\web\HttpException;
use Yii;

class ProductController extends AppController
{
    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product)){
            throw new HttpException(404, 'The requested item could not be found');
        }
        $this->setMeta('E-shopper | ' . $product->name, $product->keywords, $product->description);
        //$product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        return $this->render('view', compact('product', 'hits'));
    }

}