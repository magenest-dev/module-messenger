<?php

namespace Magenest\Messenger\Block\Chatbox;

class Dashboard extends \Magento\Backend\Block\Template
{
	protected $_userColFactory;
	/**
	 * @var \Magento\Framework\App\ResourceConnection
	 */
	protected $resource;
	
	public function __construct(
		\Magento\Backend\Block\Template\Context $context,
		\Magenest\Messenger\Model\ResourceModel\UserData\CollectionFactory $userColFactory,
		\Magento\Framework\App\ResourceConnection $resource,
		array $data = []
	) {
		$this->_userColFactory = $userColFactory;
		$this->resource = $resource;
		parent::__construct($context, $data);
		
	}
	
	
	public function getStatUserAge()
	{
		$ageData = [];
		$connection = $this->resource->getConnection();
		$tableName = $connection->getTableName('magenest_messenger_userdata');
		$result = $connection->fetchAll('SELECT user_age, COUNT(*) as total FROM ' . $tableName .' GROUP BY user_age');
		foreach ($result as $data) {
			$ageData[] = [$data['user_age'], (int)$data['total']];
		}
		
		
		return $this->getArrayJs($ageData);
	}
	
	
	public function getStatUserLocation()
	{
		$locationData = [];
		$connection = $this->resource->getConnection();
		$tableName = $connection->getTableName('magenest_messenger_userdata');
		$result = $connection->fetchAll('SELECT user_location, COUNT(*) as total FROM ' . $tableName .' GROUP BY user_location');
		
		foreach ($result as $data) {
			$locationData[] = [$data['user_location'], (int)$data['total']];
		}
		return $this->getArrayJs($locationData);
	}
	
	
	public function getArrayJs($string)
	{
		$data = json_encode($string);
		
		$convert1 = str_replace("\"", "\'", $data);
		
		$convert2 = str_replace("\\", "", $convert1);
		
		return $convert2;
	}
}
