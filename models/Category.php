<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 31.12.2017
 * Time: 20:24
 */

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 */
class Category extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::clasName(), ['category_id' => 'id']);
    }

}