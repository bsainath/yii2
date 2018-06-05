<?php

namespace app\components;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class TrimBehavior extends Behavior
{


    public function events()
    {
        return [ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate'];

    }//end events()


    public function beforeValidate($event)
    {
        $attributes = $this->owner->attributes;
        foreach ($attributes as $key => $value) {
            // For all model attributes
            $this->owner->$key = trim($this->owner->$key);
        }

    }//end beforeValidate()


}//end class
