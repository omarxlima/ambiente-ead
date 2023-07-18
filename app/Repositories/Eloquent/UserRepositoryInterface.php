<?php

 namespace App\Repositories;

use App\Repositories\Eloquent\UserRepository;

 interface UserRepostitoryInterface
 {

    public function getAll(string $filter = '');
    public function findById(string $id):object|null;
    public function create(array $data):object;
    public function update( string $id, array $data):object|null;
    public function delete(string $id):bool;

}

