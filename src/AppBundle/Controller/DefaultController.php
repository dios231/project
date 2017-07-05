<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @param ContainerInterface $container
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, ContainerInterface $container)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($container->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}