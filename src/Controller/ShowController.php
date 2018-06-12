<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use phpDocumentor\Reflection\Types\Integer;
use App\Entity\Ticket;
use App\Service\TicketService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Show;


class ShowController extends Controller
{
    private $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketservice = $ticketService;
    }

    /**
     * Update ticket to reserved
     *
     * @param $id
     * @return Ticket
     */
    public function __invoke(Show $show): Show
    {
//        $ticket = $this->ticketService->reserved($id);
//
//        if (!$ticket) {
//            throw $this->createNotFoundException(
//                'No show ticket'
//            );
//        }

        return $show;
    }
}
