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
		//,"comments.name"
		$select->cols(["comments.*", "users.avatar"])
		->from("comments")
		->leftJoin("users", "comments.user_id = users.id")
		->where("comments.hide = 1")        
		//->where('hide = NULL')
		->orderBy(["id DESC"]);

		// prepare the statment
		$sth = $this->pdo->prepare($select->getStatement());
		//d($sth);die;
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

    public function insert($table, $data) 
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)                   // INTO this table
            ->cols($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        // bind the values and execute
        $sth->execute($insert->getBindValues());
    }

    public function delete($table, $id) 
    {
        $delete = $this->queryFactory->newDelete();
        $delete->from($table)
            ->where('id = :id')
            ->bindValue('id',$id);
        
        $sth = $this->pdo->prepare($delete->getStatement());
        
        // bind the values and execute
        $sth->execute($delete->getBindValues());
    }

        public function update($table,$id,$data)
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table($table)                  // update this table
            ->cols($data)
            ->where('id = :id')           // AND WHERE these conditions
            ->bindValue('id', $id);   // bind one value to a placeholder
        $sth = $this->pdo->prepare($update->getStatement());
        
        // bind the values and execute
        $sth->execute($update->getBindValues());            
    }
	
}