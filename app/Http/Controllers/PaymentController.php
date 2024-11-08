<?php

namespace App\Http\Controllers;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateCarRequest;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    protected $carService;

    function __construct(
        CarService $carService,
    )
    {
        $this->carService = $carService;
    }


}
