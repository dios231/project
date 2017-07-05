<?php

namespace AppBundle\Query;

use AppBundle\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/7/2017
 * Time: 2:08 μμ
 */
class UserQuery implements IQuery
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle(UserRepository $Repository)
    {
        $user = $Repository->find($this->userId);

        if(!$user)
            return (['status'=>400, 'payload'=>[], 'error'=>'No user with such id exist']);

        return  ['status'=> 200, 'payload'=>$user];
    }
}