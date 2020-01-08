<?php


namespace Magenest\Messenger\Model\ResourceModel\UserData;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Magenest\Messenger\Model\UserData', 'Magenest\Messenger\Model\ResourceModel\UserData');
	}
}
