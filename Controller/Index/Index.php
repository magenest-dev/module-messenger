<?php
/**
 * User
 *
 * @copyright Copyright © 2018 Magenest. All rights reserved.
 * @author    sonstephendo@gmail.com
 */

namespace Magenest\Messenger\Controller\Index;


use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
	
	protected $resultPageFactory;
	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	) {
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}
	
	public function execute()
	{
		return $this->resultPageFactory->create();
	}
	
}