<?php

namespace App\Repository;

use App\Entity\TaskPriority;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaskPriority|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaskPriority|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaskPriority[]    findAll()
 * @method TaskPriority[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskPriorityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskPriority::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TaskPriority $entity, bool $flush = true): void
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
    public function remove(TaskPriority $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
