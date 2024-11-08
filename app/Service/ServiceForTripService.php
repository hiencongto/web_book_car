<?php
namespace App\Service;

use App\Repositories\RepositoryInterface\TripServiceRepositoryInterface;
use Illuminate\Http\Request;

class ServiceForTripService
{
    protected $tripServiceRepository;

    function __construct(
        TripServiceRepositoryInterface $tripServiceRepository,
    )
    {
        $this->tripServiceRepository = $tripServiceRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data = [])
    {
        return $this->tripServiceRepository->create($data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete( int $id)
    {
        return $this->tripServiceRepository->delete($id);
    }

}
