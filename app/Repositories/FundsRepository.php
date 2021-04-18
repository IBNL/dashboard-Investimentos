<?php


namespace App\Repositories;
use App\Models\Fundo;
use App\Repositories\AbstractRepository;

class FundsRepository extends AbstractRepository
{
    protected $model = Fundo::class;
}