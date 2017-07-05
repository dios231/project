<?php

namespace AppBundle\Services;
use AppBundle\Entity\Log;
use AppBundle\Query\IQuery;
use AppBundle\Repository\LogRepository;
use AppBundle\Repository\UserRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

/**
* Decorator of Iquery for loging requests
 */
class LogRequestDecorator implements IQuery
{
    protected $request;
    protected $query;
    protected $manager;

    public function __construct(IQuery $query, Request $request, ObjectManager $manager)
    {
        $this->query = $query;
        $this->request = $request;
        $this->manager = $manager;
    }
    public function handle(UserRepository $repository)
    {

        $log = new Log();

        $log->setTimestamp($this->request->getClientIp());
        $log->setMethod($this->request->getMethod());
        $log->setUserId($this->request->get('id'));

        $this->manager->persist($log);
        $this->manager->flush();

        return $this->query->handle($repository);
    }
}