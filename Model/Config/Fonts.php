<?php
/**
 * Fonts
 *
 * @copyright Copyright © 2018 Magenest. All rights reserved.
 * @author    sonstephendo@gmail.com
 */

namespace Magenest\Messenger\Model\Config;


class Fonts implements \Magento\Framework\Data\OptionSourceInterface
{
	public function toOptionArray()
	{
		return [
			[
				'value' => 'Archivo-Regular',
				'label' => __('Archivo')
			],
			[
				'value' => 'FjallaOne-Regular',
				'label' => __('FjallaOne')
			],
			[
				'value' => 'FrankRuhlLibre-Regular',
				'label' => __('FrankRuhlLibre')
			],
			[
				'value' => 'Karla-Regular',
				'label' => __('Karla')
			],
			[
				'value' => 'PlayfairDisplay-Regular',
				'label' => __('PlayfairDisplay')
			],
			[
				'value' => 'Roboto-Regular',
				'label' => __('Roboto')
			],
		];
	}
}