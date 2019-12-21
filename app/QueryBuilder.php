<?php
namespace App;

use Aura\SqlQuery\QueryFactory;
use PDO;

class queryBuilder 
{
	private $pdo;
	private $queryFactory;

	public function __construct()
	{
		$this->pdo = new PDO('mysql:host=localhost;dbname=marlin', 'mysql', 'mysql');
		$this->queryFactory = new QueryFactory('mysql');
	}

	public function getAll($table)
	{
		$select = $this->queryFactory->newSelect();

		$select->cols(['*'])
		->from($table);		

		$sth = $this->pdo->prepare($select->getStatement());

		$sth->execute($select->getBindValues());

		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	

	public function getAllComments($cols, $table1, $table2, $where1, $where2, $orderBy)
	{
		$select = $this->queryFactory->newSelect();

		$select
		->cols($cols)
    	->from($table1) 
    	->from($table2) 
    	->where($where1)
    	->where($where2)
    	->orderBy($orderBy);

		// prepare the statment
		$sth = $this->pdo->prepare($select->getStatement());

		// bind the values and execute
		$sth->execute($select->getBindValues());

		// get the results back as an associative array
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}
}