<?php
namespace App\Service;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateCarRequest;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;
use Illuminate\Http\Request;

use App\Service\ImageService;

class CarService
{
    protected $carRepository;
    protected $imageService;

    public function __construct(
        CarRepositoryInterface $carRepository,
        ImageService $imageService,
    )
    {
        $this->carRepository = $carRepository;
        $this->imageService = $imageService;
    }

    /**
     * @return mixed
     */
    function getAllCar()
    {
        return $this->carRepository->getAll();
    }

    /**
     * @param $id
     * @return false|mixed
     */
    function getCarById( $id)
    {
        try {
            return $this->carRepository->find($id);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param CreateCarRequest $request
     * @return mixed
     */
    function createCarForAdmin(CreateCarRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $image_name = $this->imageService->addNewImage($request->file('image'), 'image/cars');
        }
        else $image_name = 'car_icon_dft.png';

        $data = [
            'type' => $request->type,
            'license' => $request->license,
            'car_plate' => $request->car_plate,
            'seat_num' => $request->seat_num,
            'status_id' => $request->status_id,
            'image' => $image_name,
        ];

        return $this->carRepository->create($data);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    function updateCarForAdmin(Request $request, $id)
    {
        $car = $this->carRepository->find($id);

        if ($request->hasFile('image_car'))
        {
            $this->imageService->deleteImage($car->image, 'image/cars');
            $image_car = $this->imageService->addNewImage($request->file('image_car'), 'image/cars');
        }
        else $image_car = $car->image;

        $data = [
            'type' => $request->type ?? $car->type,
            'license' => $request->license ?? $car->license,
            'car_plate' => $request->car_plate ?? $car->car_plate,
            'seat_num' => $request->seat_num ?? $car->seat_num,
            'status_id' => $request->status_id ?? $car->status_id,
            'image' => $image_car,
        ];

        return $this->carRepository->update($id, $data);
    }

    /**
     * @param $time_start
     * @param $time_end
     * @return array
     */
    public function getCarNotBusy( $time_start, $time_end)
    {
        $carsNotBusy = [];
        $cars = $this->carRepository->getAll();

        foreach ($cars as $car)
        {
            if ($car->status_id !== CommonConstant::STATUS_ID['car_active'])
            {
                continue;
            }

            $isBusy = false;
            $tripsOfCar = $car->trips;

            foreach ($tripsOfCar as $tripOfCar)
            {
                if ($tripOfCar->status_id !== CommonConstant::STATUS_ID['trip_finished'] &&
                    $tripOfCar->status_id !== CommonConstant::STATUS_ID['trip_cancel'] &&
                    ! ( $time_end < $tripOfCar->time_start || $tripOfCar->time_end <= $time_start ))
                {
                    $isBusy = true;
                    break;
                }
            }

            if ($isBusy)
            {
                continue;
            }
            else{
                $carsNotBusy[] = $car;
            }
        }

        return $carsNotBusy;
    }

    public function query()
    {
        return $this->carRepository->query();
    }
}
