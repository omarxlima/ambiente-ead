<?php

 namespace App\Services;

use App\Repositories\Eloquent\SupportRepository;
use App\Repositories\SupportRepositoryInterface;
use stdClass;

 class SupportService
 {
    private $repository;

    public function __construct(SupportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getSupports(string $status = 'P')
    {
        return $this->repository->getByStatus($status);



    }

 }
