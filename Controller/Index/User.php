<?php

namespace Magenest\Messenger\Controller\Index;

use Magento\Framework\App\Action\Context;

class User extends \Magento\Framework\App\Action\Action
{
	/**
	 * User constructor.
	 *
	 * @param Context                                    $context
	 * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
	 */
	public function __construct(
		Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}
	
	/**d
	 * @param $user_email
	 * @return bool
	 */
	public function checkExist($user_email)
	{
		$collection = \Magento\Framework\App\ObjectManager::getInstance()
			->create('Magenest\Messenger\Model\UserData')->getCollection();
		
		foreach ($collection as $data) {
			if ($data->getUserEmail() === $user_email) {
				return false;
			}
		}
		return true;
	}
	
	public function execute()
	{
		$collection = $this->_objectManager->create('Magenest\Messenger\Model\UserData');
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->checkExist($_POST['email_user'])) {
				$collection->setUserName($_POST['name_user']);
				$collection->setUserEmail($_POST['email_user']);
				$collection->setUserBirthday($_POST['birthday_user']);
				$collection->setUserLocation($_POST['location_user']);
				$collection->setUserLinkfb($_POST['linkfb_user']);
				$collection->setUserAge($_POST['age_user']);
				$collection->save();
			}
		}
		return $this->resultPageFactory->create();
	}
}
