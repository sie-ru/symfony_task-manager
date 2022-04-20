<?php

namespace App\Repository;

use App\Entity\TaskStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TaskStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method TaskStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method TaskStatus[]    findAll()
 * @method TaskStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TaskStatus::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(TaskStatus $entity, bool $flush = true): void
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
    public function remove(TaskStatus $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
