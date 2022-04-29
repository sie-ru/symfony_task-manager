<?php

namespace App\Repository;

use App\Entity\Project;
use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    public function getProjectById($id)
    {
        return $this->getProjectsQueryBuilder()
            ->where('id', '=', $id)
            ->getQuery()
            ->getResult(AbstractQuery::HYDRATE_ARRAY); 
    }

    public function getPojectId()
    {
        return $this->getProjectsQueryBuilder()
                    ->select('id')
                    ->getQuery()
                    ->getResult(AbstractQuery::HYDRATE_ARRAY);
    }

    public function getProjectList()
    {
        return $this->getProjectsQueryBuilder()
                    ->getQuery()
                    ->getResult(AbstractQuery::HYDRATE_ARRAY);
    }
    
    public function getProjectsQueryBuilder() : QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }
    
}
