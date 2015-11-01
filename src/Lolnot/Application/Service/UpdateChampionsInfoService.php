<?php

namespace Lolnot\Application\Service;

use Lolnot\Domain\Champion\ChampionRepository;
use Lolnot\Domain\Champion\Champion;
use Lolnot\Domain\Champion\ChampionCollection;

class UpdateChampionsInfoService implements ApplicationService
{

	/**
	 * 
	 * @var ChampionRepository
	 */
	protected $championRepositoryToRead;
	
	/**
	 *
	 * @var ChampionRepository
	 */
	protected $championRepositoryToWrite;

	public function __construct(
		ChampionRepository $championRepositoryToRead,
		ChampionRepository $championRepositoryToWrite
	) {
		$this->championRepositoryToRead  = $championRepositoryToRead;
		$this->championRepositoryToWrite = $championRepositoryToWrite;
	}
	
	// Add new champions, but dont delete and update data.
	/**
	 * (non-PHPdoc)
	 * @see \Lolnot\Application\Service\ApplicationService::execute()
	 * 
	 * @return ChampionCollection|null
	 */
	public function execute()
	{
		$newChampions = $this->championRepositoryToRead->fetchAll();

		if ($newChampions === null) {
			return null;
		}
		
		$oldChampions = $this->championRepositoryToWrite->fetchAll();
		
		/* @var $champion Champion */
		foreach ($oldChampions->getAll() as $champion) {

			$newChampions->removeById($champion->getId());
		}

		// No new champions to update.
		if ($newChampions->isEmpty()) {
			return null;
		}
		
		$this->championRepositoryToWrite->persist($newChampions);
		
		return $newChampions;
	}
}