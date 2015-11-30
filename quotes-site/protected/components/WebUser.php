<?php

class WebUser extends CWebUser
{
    public function __get($name)
    {
        if ($this->hasState('__userInfo')) {
            $user = $this->getState('__userInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration)
    {
        $this->setState('__userInfo', $identity->getUser());
        parent::login($identity, $duration);
    }

    public function getInfo()
    {
        if ($this->hasState('__userInfo'))
            return $this->getState('__userInfo',array());
    }

    public function isAdmin()
    {
        if ($this->hasState('__userInfo'))
            $userInfo = $this->getState('__userInfo',array());
        else
            return false;

        return $userInfo->isAdmin();
    }

    public function isBusiness()
    {
        if ($this->hasState('__userInfo'))
            $userInfo = $this->getState('__userInfo',array());
        else
            return false;

        return $userInfo->isBusiness();
    }

    public function isCustomer()
    {
        if ($this->hasState('__userInfo'))
            $userInfo = $this->getState('__userInfo',array());
        else
            return false;

        return $userInfo->isCustomer();
    }
}