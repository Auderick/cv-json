<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CvController extends AbstractController
{
    #[Route('/', name: 'app_cv')]
    public function index(): Response
    {
        /* Pour retourner le chemin absolu du répertoire */
        $projectDir = $this->getParameter('kernel.project_dir');

        /* Pour lire le contenu du fichier JSON */
        $json = file_get_contents($projectDir . '/import/cv.json');

        /* On désérialise le contenu du fichier JSON */
        $cv = json_decode($json, true);

        return $this->render('cv/index.html.twig', [
            'cv' => $cv,
        ]);
    }
}
