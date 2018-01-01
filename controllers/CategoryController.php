<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 01.01.2018
 * Time: 14:11
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\Request;

class CategoryController extends AppController
{

    /**
     * @return string
     */
    public function actionIndex()
    {

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));

    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {

        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->limit(6)->all();
        return $this->render('view', compact('products'));

    }

}