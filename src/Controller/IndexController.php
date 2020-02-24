<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hotel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        $hotels = $this->getDoctrine()
        ->getRepository(Hotel::class)
        ->findAll();
        $response = new Response($this->json(['data'=>$hotels]));
        return $response;
        // return $this->json([
        //     'data' => $hotels
        // ]);
    }

    /**
     * @Route("/somePost/{id}", name="getName", methods={"POST"})
     */
    public function getName(Request $request, $id): Response
    {
        $jsonRes = json_decode($request->getContent());
        $jsonRes->someVar = $request->query->get('someVar');
        $jsonRes->id = $id;
       
        return new Response(json_encode($jsonRes));
    }
}
