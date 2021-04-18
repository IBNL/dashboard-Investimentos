<?php

namespace App\Services;

use App\Models\Fundo;
use App\Repositories\FundsRepository;

class FundoService
{

    public function __construct(FundsRepository $fundsRepository)
    {
        $this->fundsRepository = $fundsRepository;
    }

    public function getAll()
    {
        return $this->fundsRepository->all();
    }

    public function getSelectedFunds($selectedFunds)
    {
        $funds = $selectedFunds['name'];
        $dataSelectedFunds = Fundo::whereIn('name', $funds)->get();
        return $dataSelectedFunds;
    }

    public function getDataFromFunds($selectedFunds)
    {
        $dateInicio = $selectedFunds['dateInicio'];
        $dateFim = $selectedFunds['dateFim'];

        $fundos = $this->getSelectedFunds($selectedFunds);

        $dados = collect();
        foreach ($fundos as $fundo) {
            $fundo = Fundo::where('name', $fundo->name)->first();
            $patrimonios = $fundo->fundos($dateInicio, $dateFim)->get();

            foreach ($patrimonios as $patrimonio) {
                $dados->push(
                    [
                        'name' => $fundo->name,
                        'data' => $patrimonio->date,
                        'value' => $patrimonio->value
                    ]
                );
            }
        }
        return $dados;
    }

    public function getAllDate($dataFunds)
    {
        $dataFund = collect();
        $dataFund = $dataFunds->pluck('data')->unique();
        return $dataFund->splice(0, 30);
        #return $dataFund;
    }

    public function getValuesFromItem($dataFunds, $nameFound)
    {
        $allDataFound = $dataFunds->where('name', $nameFound);
        $valueFound = $allDataFound->pluck('value');
        return $valueFound;
    }

    public function getNameFromItem($dataFunds)
    {
        $nameItem = $dataFunds->pluck('name')->unique();
        return $nameItem->toArray();
    }
}
