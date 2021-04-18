<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Founds\IndexFundsRequest;
use App\Services\FundoService;

class FundoController extends Controller
{

    public function __construct(FundoService $fundoService)
    {
        $this->fundoService = $fundoService;
    }

    public function home()
    {
        $allFounds = $this->fundoService->getAll();
        return view('home')->with('funds', $allFounds);
    }


    public function index(IndexFundsRequest $indexFundsRequest)
    {
        $dataFromRequest = $indexFundsRequest->only('name', 'dateInicio', 'dateFim');
        $dataFunds = $this->fundoService->getDataFromFunds($dataFromRequest);

        $nameSelectedFounds = $this->fundoService->getNameFromItem($dataFunds);
        $dataSet = collect();
        $colors = ['#5eb84d', '#6fccdd', '#3282bf', '#75539e'];
        $i = 0;
        foreach ($nameSelectedFounds as $nameFound) {
            $values = $this->fundoService->getValuesFromItem($dataFunds, $nameFound);
            $dataSet->push(
                [
                    "label" => $nameFound,
                    "data" => $values,
                    "fill" => 'true',
                    "pointBackgroundColor" => $colors[$i],
                    "borderColor" => $colors[$i],
                    "pointHighlightStroke" => $colors[$i],
                    "borderCapStyle"  => 'butt'
                ]
            );
            $i++;
        }

        $rangeData = $this->fundoService->getAllDate($dataFunds, $dataFromRequest['dateInicio'], $dataFromRequest['dateFim']);
        return view('fundos')
            ->with('rangeData', $rangeData->toJson())
            ->with('dataSet', $dataSet);
    }
}
