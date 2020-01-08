<?php

namespace Magenest\Messenger\Controller\Adminhtml\Chatbox;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Dashboard extends \Magento\Backend\App\Action
{
	
	/**
	 * @var PageFactory
	 */
	protected $_resultPageFactory;
	
	/**
	 * Index constructor.
	 *
	 * @param Context     $context
	 * @param PageFactory $resultPageFactory
	 */
	
	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	) {
		parent::__construct($context);
		$this->_resultPageFactory = $resultPageFactory;
	}
	
	/**
	 * @return \Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('User Statistics'));
		return $resultPage;
	}
}
