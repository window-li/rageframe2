<?php
namespace addons\RfExample\common\models;

use Yii;
use yii\mongodb\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for collection "mongodb curd".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $sort
 * @property mixed $status
 * @property mixed $cover
 * @property mixed $author
 * @property mixed $longitude
 * @property mixed $latitude
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class MongoDbCurd extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        // [数据库, 集合名(表名)]
        return ['rageframe', 'curd'];
    }

    /**
     * 表字段
     *
     * {@inheritdoc}
     */
    public function attributes()
    {
        return array_keys($this->attributes());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status', 'cover', 'longitude', 'latitude'], 'required'],
            [['sort', 'created_at', 'updated_at'], 'integer'],
            [['author'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'title' => '标题',
            'sort' => '排序',
            'status' => '状态',
            'cover' => '封面',
            'author' => '作者',
            'longitude' => '经度',
            'latitude' => '纬度',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
}