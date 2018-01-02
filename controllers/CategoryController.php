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
use yii\data\Pagination;
use yii\web\HttpException;
use yii\web\Request;

class CategoryController extends AppController
{

    /**
     * @return string
     */
    public function actionIndex()
    {

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-shopper');
        return $this->render('index', compact('hits'));

    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw new HttpException(404, 'The requested item could not be found');
        }
        //$products = Product::find()->where(['category_id' => $id])->limit(6)->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('E-shopper | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        if(!$q){
            return $this->render('search');
        }
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('E-shopper | Search: '. $q);
        return $this->render('search', compact('products', 'pages', 'q'));
    }

}



