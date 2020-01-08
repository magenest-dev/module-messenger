<?php
/**
 * PageTabs
 *
 * @copyright Copyright © 2018 Magenest. All rights reserved.
 * @author    sonstephendo@gmail.com
 */

namespace Magenest\Messenger\Model\Config;


class PageTabs implements \Magento\Framework\Data\OptionSourceInterface
{
	
	public function toOptionArray()
	{
		return [
			[
				'value' => 'timeline',
				'label' => 'Timeline'
			],
			[
				'value' => 'events',
				'label' => 'Events'
			],
			[
				'value' => 'messages',
				'label' => 'Messages'
			],
		];
	}
}