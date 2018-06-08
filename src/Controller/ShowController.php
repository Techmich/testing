<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Show;

/**
 * @Route("/show")
 */
class ShowController extends Controller
{
    /**
     * @Route("/{id}", name="show_detail")
     */
    public function detail($id)
    {
        $show = $this->getDoctrine()->getRepository(Show::class)->find($id);

        if (!$show) {
            throw $this->createNotFoundException(
                'No show found'
            );
        }

        return $this->render('show/detail.html.twig', [
            'show' => $show,
        ]);
    }
}
