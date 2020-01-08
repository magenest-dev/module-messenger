<?php
/**
 * Fonts
 *
 * @copyright Copyright © 2018 Magenest. All rights reserved.
 * @author    sonstephendo@gmail.com
 */

namespace Magenest\Messenger\Model\Config;


class BoxSize implements \Magento\Framework\Data\OptionSourceInterface
{
	public function toOptionArray()
	{
		return [
			[
				'value' => 'medium',
				'label' => __('Medium')
			],
			[
				'value' => 'large',
				'label' => __('Large')
			],
		];
	}
}