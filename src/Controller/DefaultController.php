<?php

namespace App\Controller;

use App\Service\ServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    /**
     * @Route("/api/getbooks", name="books")
     * @param Request $request
     * @param ServiceInterface $service
     * @return JsonResponse
     */
    public function getBooks(Request $request, ServiceInterface $service):JsonResponse
    {
        $page = $request->query->get('page', 1);
        $queryString = $request->query->get('q', false);
        if(!$queryString){
            return new JsonResponse();
        }
        $service->webclient->setUrl(sprintf($this->getParameter('api_url_mask'), $this->getParameter('api_url'), $queryString, $page*10));
        return new JsonResponse($service->getBooks());
    }

    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }
}
