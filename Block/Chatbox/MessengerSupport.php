<?php

namespace Magenest\Messenger\Block\Chatbox;

use Magento\Framework\View\Element\Template;

class MessengerSupport extends Template implements \Magento\Widget\Block\BlockInterface
{
	
	const MESSENGER_CONFIG_PATH = 'messengerchat/messenger_setting/';
	const PAGE_GENERAL_CONFIG_PATH = 'pagesupport/general_setting/';
	const PAGE_CUSTOM_CONFIG_PATH = 'pagesupport/custom_setting/';
	const USER_URL = 'messenger/index/user';
	
	/**
	 * MessengerSupport constructor.
	 *
	 * @param Template\Context $context
	 * @param array            $data
	 */
	public function __construct(
		Template\Context $context,
		array $data = []
	) {
		parent::__construct($context, $data);
		
	}
	
	public function getConfig()
	{
		return [
			'enable_messenger' => $this->getMessengerConfig('enable_messenger'),
			'greeting_message' => $this->getMessengerConfig('greeting_message'),
			'theme_color'      => $this->getMessengerConfig('theme_color'),
			'page_id'          => $this->getMessengerConfig('page_id'),
			
			'enable_fanpage' => $this->getPageGeneralConfig('enable_fanpage'),
			'link_page'      => $this->getPageGeneralConfig('link_page'),
			'app_id'         => $this->getPageGeneralConfig('app_id'),
			'tabs_setting'   => $this->getPageGeneralConfig('tabs_setting'),
			'small_header'   => $this->getPageGeneralConfig('small_header'),
			'hide_cover'     => $this->revertShow(),
			'show_facepile'  => $this->getPageGeneralConfig('show_facepile'),
			
			'title_tab'  => $this->getPageCustomConfig('title_tab'),
			'tab_color'  => $this->getPageCustomConfig('tab_color'),
			'text_color' => $this->getPageCustomConfig('text_color'),
			'text_font' => $this->getPageCustomConfig('text_font'),
			'box_width'  => $this->getBoxWidth(),
			'box_height' => $this->getBoxHeight(),
			
			'user_url' => $this->getUrl(self::USER_URL),
		];
	}
	
	private function getMessengerConfig($attr)
	{
		return $this->_scopeConfig->getValue(self::MESSENGER_CONFIG_PATH . $attr);
	}
	
	private function getPageGeneralConfig($attr)
	{
		return $this->_scopeConfig->getValue(self::PAGE_GENERAL_CONFIG_PATH . $attr);
	}
	
	private function getPageCustomConfig($attr)
	{
		return $this->_scopeConfig->getValue(self::PAGE_CUSTOM_CONFIG_PATH . $attr);
	}
	
	private function getBoxWidth()
	{
		$size = $this->getPageCustomConfig('box_size');
		if ($size === 'medium') return 300;
		else if ($size === 'large') return 375;
	}
	
	private function getBoxHeight()
	{
		$size = $this->getPageCustomConfig('box_size');
		if ($size === 'medium') return 480;
		else if ($size === 'large') return 600;
	}
	
	/**
	 * @return string
	 */
	private function revertShow()
	{
		$value = $this->getPageGeneralConfig('show_cover');
		if ($value === 'true') return 'false';
		elseif ($value === 'false') return 'true';
	}
	
}
