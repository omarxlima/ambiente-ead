<?php

 namespace App\Services\UserServices;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepostitoryInterface;

 class UserServices
 {
    private $repository;

    public function __construct(UserRepostitoryInterface $repository)
    {
        $this->repository = $repository;
    }
 }
