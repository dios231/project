<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/7/2017
 * Time: 2:39 μμ
 */

namespace AppBundle\Query;

use AppBundle\Repository\UserRepository;

interface IQuery
{
    public function handle(UserRepository $repository);
}