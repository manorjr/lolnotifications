<?php

namespace Lolnot\Infrastructure\Persistence\MySQLDatabase;

use Lolnot\Domain\Champion\ChampionRepository;
use Lolnot\Domain\Champion\Champion;
use Lolnot\Domain\Champion\ChampionCollection;

class MySQLChampionRepository implements ChampionRepository
{
	
	public function fetchAll()
	{
		$db = mysqli_connect('localhost', 'root', '', 'lol_notifications');
		if (!$db) {
			die('Could not connect: ' . mysql_error());
		}
		echo 'Connected successfully';
		
		$sql = 'SELECT * FROM champion';
		if (!$result = $db->query($sql)){
			die('There was an error running the query [' . $db->error . ']');
		}
		
		$champions = [];
		while ($row = $result->fetch_assoc()) {
			$champion = new Champion();
			$champion->setId($row['id'])
					 ->setName($row['name']);
			 
			$champions[] = $champion;
		}
		
		return new ChampionCollection($champions);
	}
	
	/**
	 * 
	 * @param unknown $id
	 * @return string
	 */
	public function fetchNameById($id)
	{
		$champions = $this->fetchAll();
		
		$champion = $champions->filterById($id);
		
		if ($champion === null) {
			return '';
		}
		
		return $champion->getName();
	}
	
	public function persist(ChampionCollection $champions)
	{
		return $this->insert($champions);
	}
	
	public function insert(ChampionCollection $champions)
	{
		$db = mysqli_connect('localhost', 'root', '', 'lol_notifications');
		if (!$db) {
			die('Could not connect: ' . mysql_error());
		}
		echo 'Connected successfully';
		
		$sql = 'INSERT INTO champion VALUES ';

		/* @var $champion Champion */
		foreach ($champions->getAll() as $champion) {
			$name = addslashes($champion->getName());
			$sql .= "('{$champion->getId()}', '{$name}'),";
		}
		$sql = substr($sql, 0, -1);

		if (!$result = $db->query($sql)){
			die('There was an error running the query [' . $db->error . ']');
		}
	}
}