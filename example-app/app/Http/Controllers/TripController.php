<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstant;
use App\Http\Requests\CreateTripDetailRequest;
use App\Http\Requests\CreateTripRequest;
use App\Repositories\RepositoryInterface\CityRepositoryInterface;
use App\Repositories\RepositoryInterface\TripRepositoryInterface;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Service\TripService;
use App\Service\CityService;
use App\Service\UserService;
use App\Service\CarService;
use App\Service\ServiceForTripService;
use App\Service\TripDetailService;
use Exception;
use Illuminate\Support\Facades\Mail;

class TripController extends Controller
{
    protected $tripService;
    protected $cityService;
    protected $userService;
    protected $carService;
    protected $serviceForTripService;
    protected $tripDetailService;

    public function __construct(
        TripService $tripService,
        CityService $cityService,
        UserService $userService,
        CarService $carService,
        ServiceForTripService $serviceForTripService,
        TripDetailService $tripDetailService,
    )
    {
        $this->cityService = $cityService;
        $this->tripService = $tripService;
        $this->userService = $userService;
        $this->carService = $carService;
        $this->serviceForTripService = $serviceForTripService;
        $this->tripDetailService = $tripDetailService;
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showListTripsForCustomer()
    {
        $trips = $this->tripService->listTripForCustomer();

        return view('customer.trip.all_trips', compact('trips'));
    }

    /**
     * @param Request $request
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function searchTrip(Request $request)
    {
        $cities = $this->cityService->getAllCity();
        $customer = Auth::check() ? Auth::user() : null ;
        $trips = $this->tripService->search($request, $customer ? $customer->id : null);

        if ($trips->isEmpty())
        {
            return redirect()->back()->with([
                'error' => 'Can not find trip',
            ]);
        }
        return view('customer.trip.all_trips', compact('trips'));
    }

    /**
     * @param $id
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showTripDetail( $id)
    {
        try {
            $user = Auth::guard('user')->user();
            $trip = $this->tripService->findTripById($id);
            $trip_details = $trip->trip_details;
            $seats = [];
            foreach ($trip_details as $trip_detail)
            {
                $seatsPerTripdetail = $trip_detail->seats;
                foreach ($seatsPerTripdetail as $seatPerTripdetail){
                    $seats[] = $seatPerTripdetail->seat_number;
                }
            }
            if ($user)
            {
                $isUserInTrip = $this->tripService->isUserInTrip($trip->id, $user->id);
            }
            else
                $isUserInTrip = false;
            return view('customer.trip.trip_detail', compact('trip', 'user', 'seats', 'isUserInTrip'));
        }
        catch (Exception $exception)
        {
            return view('404');
        }
    }

    /**
     * @param Request $request
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function filterTripForCustomer(Request $request)
    {
        try {
            $cities = $this->cityService->getAllCity();
            $customer = Auth::check() ? Auth::user() : null ;
            $trips = $this->tripService->search($request, $customer ? $customer->id : null);
            $source_id = $request->source_id;
            $destination_id = $request->destination_id;
            $time_start = $request->time_start;

            if ($trips->isEmpty())
            {
                return redirect()->back()->with([
                    'error' => 'Can not find trip',
                ]);
            }
            return view('customer.trip.all_trips', compact('trips', 'source_id', 'destination_id', 'time_start'));
        }
        catch (Exception $exception)
        {
            return redirect()->route('page-404');
        }
    }

    /*
    * ----------------------------D-----
    * ADMIN
    * ---------------------------------
    */

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showListTripForAdmin()
    {
        try {
            $trips = $this->tripService->getAll();
            $cities = $this->cityService->getAllCity();

            if ($trips)
            {
                return view('admin.trip.all_trips', compact('trips', 'cities'));
            }
            return redirect()->back();
        }
        catch (Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    public function showAddTripForAdmin()
    {
        $cities = $this->cityService->getAllCity();
        return view('admin.trip.add_new_trip', compact('cities'));
    }

    /**
     * @param Request $request
     * @return void
     */
    public function checkSchedule(Request $request)
    {
        try {
            $trip_id = $request->trip_id;
            $time_start = strtotime($request->time_start);
            $time_end = strtotime($request->time_end);

            if ($time_start && $time_end && $time_end > ($time_start + 5 *60))
            {
                $driversNotBusy = $this->userService->getDriverNotBusy($time_start, $time_end);
                $carsNotBusy = $this->carService->getCarNotBusy($time_start, $time_end);

                //co trip_id tuc la dang update
                if ($trip_id)
                {
                    $tripForUpdate = $this->tripService->findTripById($trip_id);

                    if ($tripForUpdate)
                    {
                        $driver = $tripForUpdate->driver;
                        $car = $tripForUpdate->car;
                        array_unshift($driversNotBusy, $driver);
                        array_unshift($carsNotBusy, $car);
                    }
                }

                if (count($driversNotBusy)==0 || count($carsNotBusy)==0)
                {
                    return response()->json(['err' => 'Error! Can not find suitable driver or car!']);
                }

                return response()->json(['driversNotBusy' => $driversNotBusy, 'carsNotBusy' => $carsNotBusy]);
            }
            return response()->json(['err' => 'Error! Your time is not valid!']);
        }
        catch (Exception $exception)
        {

        }
    }

    /**
     * @param CreateTripRequest $request
     * @return mixed
     */
    public function createTripForAdmin(CreateTripRequest $request)
    {
        $seat = $this->carService->getCarById($request->car_id)->seat_num;
        $time_start = strtotime($request->date_start . ' ' . $request->time_start);
        $time_end = strtotime($request->date_end . ' ' . $request->time_end);

        $data = [
            'driver_id' => $request->driver_id,
            'car_id' => $request->car_id,
            'destination_id' => $request->destination_id,
            'source_id' => $request->source_id,
            'time_start' => $time_start,
            'time_end' => $time_end,
            'fare' => $request->fare,
            'seat' => $seat,
            'status_id' => CommonConstant::STATUS_ID['trip_waiting'],
            'description' => $request->description,
        ];

        $trip = $this->tripService->create($data);

        if (!$trip)
        {
            return redirect()->back()->with([
                CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create'],
            ]);
        }

        $services = CommonConstant::SERVICE_ID;
        foreach ($services as $service => $service_id)
        {
            if ($request->exists($service))
            {
                $serviceCreate = $this->serviceForTripService->create([
                    'service_id' => (int) $service_id,
                    'trip_id' => $trip->id,
                ]);

                if (!$serviceCreate)
                {
                    return redirect()->back()->with([
                        CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create'],
                    ]);
                }
            }
        }
        return redirect()->route('list_trip')->with([
            CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_create'],
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showTripEditForAdmin( $id)
    {
        try {
            $cities = $this->cityService->getAllCity();
            $trip = $this->tripService->findTripById($id);

            if ($trip)
            {
                return view('admin.trip.edit_trip', compact('cities', 'trip'))
                    ->with('activeRouteTripEdit', 'edit_trip_admin');;
            }
            return redirect()->back();
        }
        catch (Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @param CreateTripRequest $request
     * @param $id
     * @return mixed
     */
    public function updateTripForAdmin(CreateTripRequest $request, $id)
    {
        $trip = $this->tripService->findTripById($id);
        if (!$trip)
        {
            return redirect()->back()
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }

        $seat = $this->carService->getCarById($request->car_id)->seat_num;
        $time_start = strtotime($request->date_start . ' ' . $request->time_start);
        $time_end = strtotime($request->date_end . ' ' . $request->time_end);

        $data = [
            'driver_id' => $request->driver_id,
            'car_id' => $request->car_id,
            'destination_id' => $request->destination_id,
            'source_id' => $request->source_id,
            'time_start' => $time_start,
            'time_end' => $time_end,
            'fare' => $request->fare,
            'seat' => $seat,
            'status_id' => CommonConstant::STATUS_ID['trip_waiting'],
            'description' => $request->description,
        ];

        $trip_update = $this->tripService->update($id, $data);

        if (!$trip_update)
        {
            return redirect()->back()->with([
                CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update'],
            ]);
        }

        foreach ($trip->trip_services as $trip_service) {
            $this->serviceForTripService->delete($trip_service->id);
        }

        $services = CommonConstant::SERVICE_ID;
        foreach ($services as $service => $service_id)
        {
            if ($request->exists($service))
            {
                $serviceCreate = $this->serviceForTripService->create([
                    'service_id' => (int) $service_id,
                    'trip_id' => $trip->id,
                ]);

                if (!$serviceCreate)
                {
                    return redirect()->back()->with([
                        CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create'],
                    ]);
                }
            }
        }
        return redirect()->route('list_trip')->with([
            CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_create'],
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewTripDetailForAdmin( $id)
    {
        try {
            $trip = $this->tripService->findTripById($id);
            $trip_details = $trip->trip_details ;
            return view('admin.trip.trip_detail', compact('trip', 'trip_details'))
                ->with('activeRouteTripDetail', 'show_trip_detail_admin');
        }
        catch (Exception $exception)
        {
            return redirect()->route('page-404');
        }
    }


    /*
* ----------------------------D-----
* DRIVER
* ---------------------------------
*/

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function listTripForDriver()
    {
        $cities = $this->cityService->getAllCity();
        $driver = Auth::guard('user')->user();
        $trips = $driver->trips()
            ->orderByRaw("CASE WHEN status_id = '" . CommonConstant::STATUS_ID['trip_finished'] . "' THEN 1 ELSE 0 END")
            ->orderBy('time_start', 'asc')
            ->paginate(3);

        return view('driver.list_trips_driver', compact('trips', 'cities'));
    }

    public function viewTripDetailForDriver(int $id)
    {
        $trip = $this->tripService->findTripById($id);
        $trip_details = $trip->trip_details ;
        return view('driver.trip_detail_driver', compact('trip', 'trip_details'));
    }

    /**
     * @param $id
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function startTrip( $id)
    {
        try {
            $trip= $this->tripService->update($id, ['status_id' => CommonConstant::STATUS_ID['trip_on_trip']]);
            $trip_details = $trip->trip_details;

            return view('driver.trip_processing', compact('trip', 'trip_details'));
        }
        catch (Exception $exception)
        {
            return redirect()->back();
        }
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showTripProcessingDriver()
    {
        $trip = $this->tripService->where('status_id', CommonConstant::STATUS_ID['trip_on_trip']);

        if ($trip)
        {
            $trip_details = $trip->trip_details;
            return view('driver.trip_processing', compact('trip', 'trip_details'));
        }

        return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function finishTripDriver($id)
    {
        $data = [
            'status_id' => CommonConstant::STATUS_ID['trip_finished'],
        ];
        $trip = $this->tripService->update($id, $data);
        $trip = $this->tripService->mailFinishTrip($id);
        if ($trip)
        {
            return redirect()->route('list_trip_driver')
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_update']]);
        }
        return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update']]);
    }

    /**
     * @param Request $request
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function filterTripForAdmin(Request $request)
    {
        try {
            $trips = $this->tripService->filterTrip($request);
            $from_id = $request->from_id;
            $to_id = $request->to_id;
            $status = $request->status;
            $cities = $this->cityService->getAllCity();

            if ($trips)
            {
                return view('admin.trip.all_trips',
                    compact('trips', 'from_id', 'to_id', 'status', 'cities'));
            }
            else return redirect()->back()
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }
        catch (Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @param Request $request
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function filterTripForDriver(Request $request)
    {
        try {
            $trips = $this->tripService->filterTrip($request);
            $from_id = $request->from_id;
            $to_id = $request->to_id;
            $status = $request->status;
            $cities = $this->cityService->getAllCity();

            if ($trips)
            {
                return view('driver.list_trips_driver',
                    compact('trips', 'from_id', 'to_id', 'status', 'cities'));
            }
            else return redirect()->back()
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }
        catch (Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }
}
