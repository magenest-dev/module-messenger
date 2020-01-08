<?php


namespace Magenest\Messenger\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Class InstallSchema
 *
 * @package Magenest\Messenger\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
	/**
	 * Upgrades DB schema for a module
	 *
	 * @param SchemaSetupInterface   $setup
	 * @param ModuleContextInterface $context
	 * @return void
	 * @throws \Zend_Db_Exception
	 */
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (version_compare($context->getVersion(), '1.1.0', '<')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('magenest_messenger_userdata')
			)->addColumn(
				'user_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				10,
				[
					'identity' => true,
					'unsigned' => true,
					'nullable' => false,
					'primary'  => true,
				],
				'User ID'
			)->addColumn(
				'user_name',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable' => false],
				'Name'
			)->addColumn(
				'user_email',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable' => false],
				'User Email'
			)->addColumn(
				'user_birthday',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'User Birthday'
			)->addColumn(
				'user_location',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'User Location'
			)->addColumn(
				'user_linkfb',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'User Link Facebook'
			)->addColumn(
				'user_age',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				[],
				'User Age'
			);
			$installer->getConnection()->createTable($table);
		}
		//
		$installer->endSetup();
	}
}
