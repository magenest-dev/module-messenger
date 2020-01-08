<?php


namespace Magenest\Messenger\Model;

class UserData extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this-> _init('Magenest\Messenger\Model\ResourceModel\UserData');
    }
}
