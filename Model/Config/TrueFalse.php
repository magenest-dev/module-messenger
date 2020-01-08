<?php
/**
 * PageTabs
 *
 * @copyright Copyright © 2018 Magenest. All rights reserved.
 * @author    sonstephendo@gmail.com
 */

namespace Magenest\Messenger\Model\Config;


class TrueFalse implements \Magento\Framework\Option\ArrayInterface
{
	
	/**
	 * Options getter
	 *
	 * @return array
	 */
	public function toOptionArray()
	{
		return [
			[
				'value' => 'true',
				'label' => __('Yes')
			],
			[
				'value' => 'false',
				'label' => __('No')
			]
		];
	}
	
	/**
	 * Get options in "key-value" format
	 *
	 * @return array
	 */
	public function toArray()
	{
		return ['false' => __('No'), 'true' => __('Yes')];
	}
}