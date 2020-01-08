<?php

namespace Magenest\Messenger\Model\ResourceModel;

class UserData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magenest_messenger_userdata', 'user_id');
    }
}
