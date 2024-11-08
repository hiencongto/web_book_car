<?php
namespace App\Service;

use App\Constants\CommonConstant;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\CreateTripDetailRequest;
use App\Mail\FinishTripMail;
use App\Repositories\RepositoryInterface\TripRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TripService
{
    protected $tripRepository;

    function __construct(
        TripRepositoryInterface $tripRepository,
    )
    {
        $this->tripRepository = $tripRepository;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->tripRepository->query()->orderBy('time_start', 'desc')->paginate(5);
    }

    /**
     * @param $id
     * @return false|mixed
     */
    public function findTripById($id)
    {
        try {
            return $this->tripRepository->find($id);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes = [])
    {
        return $this->tripRepository->create($attributes);
    }

    /**
     * @param $id
     * @param $attributes
     * @return mixed
     */
    public function update( $id, $attributes = [])
    {
        return$this->tripRepository->update($id, $attributes);
    }

    /**
     * @param Request $request
     * @param $customer_id
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search (Request $request, $customer_id = null)
    {
        $source_id = $request->source_id;
        $destination_id = $request->destination_id;
        $date_start = $request->time_start;
        $trips = $this->tripRepository->query()
            ->when($source_id, function ($query, $source_id) {
                $query->where('source_id', $source_id);
            })
            ->when($destination_id, function ($query, $destination_id){
                $query->where('destination_id', $destination_id);
            })
            ->when($date_start, function ($query, $date_start){
                $date_start_min = (int) strtotime($date_start);
                $date_start_max = $date_start_min + 24*60*60;
                $query->whereBetween('time_start', [$date_start_min, $date_start_max]);
            })
            ->where('status_id', CommonConstant::STATUS_ID['trip_waiting'])
            ->paginate(3);
        return $trips;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCarIdByTrip( $id)
    {
        return $this->tripRepository->find($id)->car->id;
    }

    /**
     * @param $id
     * @param $userID
     * @return mixed
     */
    public function isUserInTrip( $id, $userID)
    {
        $isUserInTrip = $this->tripRepository->find($id)->trip_details
            ->where('customer_id', $userID)->where('status_id', CommonConstant::STATUS_ID['trip_detail_pending'])
            ->isNotEmpty();
        return $isUserInTrip;
    }

    /**
     * @param $column
     * @param $value
     * @return false
     */
    public function where($column, $value)
    {
        try {
            return $this->tripRepository->where($column, $value);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function listTripForCustomer()
    {
        return $this->tripRepository->query()->orderBy('time_start', 'desc')
            ->where('time_start', '>', strtotime(now()))
            ->where('status_id', '=', CommonConstant::STATUS_ID['trip_waiting'])
            ->paginate(3);
    }

    /**
     * @param Request $request
     * @return false|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function filterTrip(Request $request)
    {
        try {
            $from_id = $request->from_id;
            $to_id = $request->to_id;
            $status = $request->status;

            $trips = $this->tripRepository->query()
                ->when($from_id, function ($query, $from_id) {
                    return $query->where('source_id', $from_id);
                })
                ->when($status, function ($query, $status) {
                    return $query->where('status_id', $status);
                })
                ->when($to_id, function ($query, $to_id) {
                    return $query->where('destination_id', $to_id);
                })
                ->paginate(5);
            return $trips;

        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function mailFinishTrip($id)
    {
        try {
            $trip= $this->tripRepository->find($id);

            $trip_details_of_trip = $trip->trip_details
                ->where('status_id', '=', CommonConstant::STATUS_ID['trip_detail_dropped_off']);

            foreach ($trip_details_of_trip as $trip_detail_of_trip)
            {
                Mail::to($trip_detail_of_trip->customer->email)->send(new FinishTripMail($trip_detail_of_trip));
            }
            return true;
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }
}
