<?php namespace Zwacky\TableAnalyzer;

use DB;

/**
 * class to analyze tables and columns.
 */
class TableAnalyzer {
	
	/**
	 * analyzes the columns of a specific table and returns their attributes.
	 *
	 * @param string $tableName
	 * @return array
	 */
	public function getColumns($tableName)
	{
		$columns = [];
		$manager = DB::connection()->getDoctrineSchemaManager();
		$tables = $manager->listTableNames();
		
		foreach ($manager->listTables() as $table) {
			if ($table->getName() == $tableName) {
				foreach ($table->getColumns() as $name => $column) {
					$columns[$column->getName()] = [
						'type' => $column->getType()->getName(),
						'length' => $column->getLength(),
						'precision' => $column->getPrecision(),
						'scale' => $column->getScale(),
						'unsigned' => $column->getUnsigned(),
						'fixed' => $column->getFixed(),
						'notnull' => $column->getNotnull(),
						'default' => $column->getDefault(),
						'default' => $column->getAutoincrement(),
						'autoincrement' => $column->getAutoincrement(),
						'comment' => $column->getComment()
					];
				}
			}
		}
		
		return $columns;
	}


}