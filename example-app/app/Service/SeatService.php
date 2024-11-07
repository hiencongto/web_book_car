<?php

namespace App\Service;

use App\Repositories\RepositoryInterface\SeatRepositoryInterface;

class SeatService
{
    protected $seatRepository;

    function __construct(
        SeatRepositoryInterface $seatRepository,
    )
    {
        $this->seatRepository = $seatRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data = [])
    {
        return $this->seatRepository->create($data);
    }

    /**
     * @param $car_id
     * @param $seat_number
     * @param $trip_id
     * @return bool
     */
    public function isSeatAvailable( $car_id, $seat_number, $trip_id)
    {
        $available = true;
        $seatsSolded = $this->seatRepository->query()
            ->where('car_id', $car_id)
            ->where('trip_id', $trip_id)
            ->get();
        foreach ($seatsSolded as $seatSolded)
        {
            $seatNumberSolded = (int) $seatSolded->seat_number ;
            if ($seatNumberSolded == $seat_number)
            {
                $available = false;
                return $available;
            }
        }

        return $available;
    }

    /**
     * @param int $tripDetailId
     * @return void
     */
    public function forceDeleteSeatByTripDetail(int $tripDetailId)
    {
        $seats = $this->seatRepository->where('trip_detail_id', $tripDetailId)->get();
        foreach ($seats as $seat)
        {
            $seat->delete();
        }
    }
}
