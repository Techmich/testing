<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Show;

class BaseController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $shows = $this->getDoctrine()->getRepository(Show::class)->findAll();

        return $this->render('base/index.html.twig', [
            'shows' => $shows,
        ]);
    }
}
