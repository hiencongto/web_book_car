<?php

namespace App\Http\Controllers;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateCarRequest;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;
use Illuminate\Http\Request;

use App\Service\CarService;

class CarController extends Controller
{
    protected $carService;

    function __construct(
        CarService $carService,
    )
    {
        $this->carService = $carService;
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showListCarForAdmin()
    {
        $cars = $this->carService->query()->paginate(3);
        return view('admin.car.all_cars', compact('cars'));
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showAddCarForAdmin()
    {
        return view('admin.car.add_new_car');
    }

    /**
     * @param CreateCarRequest $request
     * @return mixed
     */
    public function createCarForAdmin(CreateCarRequest $request)
    {
        $car = $this->carService->createCarForAdmin($request);

        if ($car)
        {
            return redirect()->route('list_car')->with(['msg' => CommonConstant::STATUS_MSG_ARRAY['success_create']]);
        }

        return redirect()->back()->with(['msg' => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showUpdateCarForAdmin( $id)
    {
        try {
            $car = $this->carService->getCarById($id);

            if ($car)
            {
                return view('admin.car.edit_car', compact('car'))
                    ->with('activeRouteUpdateCar', 'update_car_admin');
            }

            return redirect()->back();
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     */
    public function updateCarForAdmin(Request $request, $id)
    {
        try {
            $car = $this->carService->updateCarForAdmin($request, $id);

            if ($car)
            {
                return redirect()->route('list_car')->with(['msg' => CommonConstant::STATUS_MSG_ARRAY['success_update']]);
            }
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with(['msg' => CommonConstant::STATUS_MSG_ARRAY['fail_update']]);
        }
    }
}
