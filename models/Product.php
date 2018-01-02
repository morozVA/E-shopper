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
 * Class Product
 * @package app\models
 */
class Product extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}