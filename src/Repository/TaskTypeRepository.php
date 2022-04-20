<?php

namespace App\Repository;

use App\Entity\TaskType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaskType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaskType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaskType[]    findAll()
 * @method TaskType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskType::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TaskType $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(TaskType $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
