<?php


namespace Magenest\Messenger\Controller\Adminhtml\Chatbox;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Index extends \Magento\Backend\App\Action
{
	/**
	 * @var PageFactory
	 */
	protected $resultPageFactory;
	
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
		$this->resultPageFactory = $resultPageFactory;
	}
	
	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->setActiveMenu('Magenest_Messenger::chatbox');
		$resultPage->addBreadcrumb(__('User'), __('User'));
		$resultPage->addBreadcrumb(__('Manage User Data'), __('Manage User Data'));
		$resultPage->getConfig()->getTitle()->prepend(__('Manage User Data'));
		return $resultPage;
	}
	
	/**
	 * @return bool
	 */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Magenest_Messenger::chatbox');
	}
}
