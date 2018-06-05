<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\filters\AccessRule;

class AccessRuleComponent extends AccessRule
{


    /**
     * @param User $user the user object
     * @return bool whether the rule applies to the role
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }

        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } else if ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            } else if (!$user->getIsGuest() && in_array($role, \Yii::$app->session['permissions'])) {
                return true;
            }
        }

        return false;

    }//end matchRole()


}//end class
