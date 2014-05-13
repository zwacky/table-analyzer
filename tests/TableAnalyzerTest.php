<?php namespace Zwacky\TableAnalyzer\Tests;

use Zwacky\TableAnalyzer\TableAnalyzer;

class TableAnalyzerTest extends \Orchestra\Testbench\TestCase {

	public function setUp()
	{
		parent::setUp();
		var_dump(phpversion());
        \Artisan::call('migrate', [
            '--database' => 'tableanalyzer',
            '--path'     => '../tests/migrations',
        ]);
	}

	public function tearDown()
	{
		parent::tearDown();
	}

	/**
	* define environment setup.
	*
	* @param Illuminate\Foundation\Application $app
	*/
	protected function getEnvironmentSetUp($app)
	{
		// reset base path to point to our package's src directory
		$app['path.base'] = __DIR__ . '/../src';

		$app['config']->set('database.default', 'tableanalyzer');
		$app['config']->set('database.connections.tableanalyzer', array(
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		));
	}

	/**
	 * detects the basic table columns.
	 */
	public function testSchemaDetection()
	{
		$tableName = 'basic';
		$expected = [
			'id' => 'integer',
			'name' => 'string',
			'ordering' => 'integer',
			'doge_coins' => 'float',
			'content' => 'text',
			'published' => 'boolean',
			'birthday' => 'date',
			'created_at' => 'datetime',
			'updated_at' => 'datetime'
		];

		$analyzer = new TableAnalyzer;
		$columns = $analyzer->getColumns($tableName);
		$actual = [];
		foreach ($columns as $columnKey => $column) {
			$actual[$columnKey] = $column['type'];
		}

		$this->assertEquals($expected, $actual);
	}

}
