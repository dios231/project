<?php
namespace AppBundle\Controller;

use AppBundle\Query\UserQuery;
use AppBundle\Repository\UserRepository;
use AppBundle\Services\LogRequestDecorator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class UserController extends FOSRestController
{

    /**
     * @Rest\Get("/user/{id}")
     */
    public function getUserResource($id, Request $request)
    {

        $LogRequestDecorator = new LogRequestDecorator(new UserQuery($id), $request, $this->getDoctrine()->getManager());
        $response = $LogRequestDecorator->handle($this->getDoctrine()->getRepository('AppBundle:User'));

        $serializer = $this->container->get('jms_serializer');
        $response = $serializer->serialize($response, 'json');

        return new Response($response);
    }
}