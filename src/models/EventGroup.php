<?php

namespace DevGroup\EventsSystem\models;

use DevGroup\EventsSystem\helpers\EventHelper;
use DevGroup\EventsSystem\traits\ListData;
use DevGroup\TagDependencyHelper\TagDependencyTrait;

/**
 * This is the model class for table "{{%devgroup_event_group}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $owner_class_name
 */
class EventGroup extends \yii\db\ActiveRecord
{
    use TagDependencyTrait;
    use ListData;

    public function behaviors()
    {
        return [
            'tagDependency' => [
                'class' => 'DevGroup\TagDependencyHelper\CacheableActiveRecord',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%devgroup_event_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['owner_class_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => EventHelper::t('ID'),
            'name' => EventHelper::t('Name'),
            'description' => EventHelper::t('Description'),
            'owner_class_name' => EventHelper::t('Owner class name'),
        ];
    }
}
