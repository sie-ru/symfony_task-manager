<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $projects = $this->entityManager->getRepository(Project::class)->getProjectList();
        
        return $this->render('index.html.twig', [
            'data' => $projects
        ]);
    }
}
