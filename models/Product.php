<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id

 * @property int $count
 * @property string $price_come
 * @property string $prise_sale
 * @property int $first_count
 * @property int $gender_id
 * @property int $material_id
 * @property string $date
 */
class Product extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'artikul','count', 'price_come', 'prise_sale', 'first_count', 'gender_id', 'material_id', 'date'], 'required'],
            [['category_id', 'count', 'first_count', 'gender_id', 'material_id'], 'integer'],
            [['price_come', 'prise_sale'], 'number'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Maxsulot nomi'),
            'artikul' => Yii::t('app', 'Maxsulot kodi'),

            'count' => Yii::t('app', 'Soni (dona)'),
            'price_come' => Yii::t('app', 'Tan narxi'),
            'prise_sale' => Yii::t('app', 'Sotish narxi'),
            'first_count' => Yii::t('app', 'First Count'),
            'gender_id' => Yii::t('app', 'Erkak/Ayol'),
            'material_id' => Yii::t('app', 'Material'),
            'date' => Yii::t('app', 'Sana'),
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    public function getCategoryImg(){
        $category = $this->category;
        return $category? $category->img : '';
    }
    public function getGender(){
        return$this->hasOne(Gender::className(),['id'=>'gender_id']);
    }

    public function getGenderName(){
        $gender = $this->gender;
        return $gender? $gender->title : '';
    }


    public function getMaterial(){
        return $this->hasOne(Material::className(),['id'=>'material_id']);
    }
    public function getMaterialName(){
        $material = $this->material;
        return $material? $material->title : '';
    }


    public function getImageurl()
    {
        return \Yii::$app->request->BaseUrl.'../'.$this->img;
    }



    public function getCategoryName(){
        $category = $this->category;
        return $category ? $category->title : '';
    }

}
