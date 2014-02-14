TableAnalyzer
=============

Database column analyzer tool for the developer on the go.

Usage
-----

```php
   $analyzer = new \Zwacky\TableAnalyzer\TableAnalyzer;
   $columns = $analyzer->getColumns('table_name');
```

returns an array of every column and their types, e.g.:

```
'content' => array(10) {
	'type' => string(4) "text"
	'length' => NULL
	'precision' => int(10)
	'scale' => int(0)
	'unsigned' => bool(false)
	'fixed' => bool(false)
	'notnull' => bool(true)
	'default' => bool(false)
	'autoincrement' => bool(false)
	'comment' => NULL
}
```