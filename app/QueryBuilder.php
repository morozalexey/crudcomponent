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

	public function getAllComments()
	{
		$select = $this->queryFactory->newSelect();

		$select->cols(["comments.*", "users.avatar","comments.name"])
		->from("comments")
		->leftJoin('users', 'comments.user_id = users.id')
		->orderBy(['id DESC']);

		// prepare the statment
		$sth = $this->pdo->prepare($select->getStatement());

		// bind the values and execute
		$sth->execute($select->getBindValues());

		// get the results back as an associative array
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	public function getOne($table, $id) 
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from($table)
            ->where('id = :id')
            ->bindValue('id',$id);
        $sth = $this->pdo->prepare($select->getStatement());
        // bind the values and execute
        $sth->execute($select->getBindValues());
        
        // get the results back as an associative array
        
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

	
}