<?php

namespace App\Service;

use App\Repositories\RepositoryInterface\CityRepositoryInterface;

class CityService
{
    protected $cityRepository;

    function __construct(
        CityRepositoryInterface $cityRepository,
    )
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @return mixed
     */
    public function getAllCity()
    {
        return $this->cityRepository->getAll();
    }


}
