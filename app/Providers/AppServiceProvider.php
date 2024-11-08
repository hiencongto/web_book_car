<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\City;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use App\Repositories\Repository\BlogRepository;
use App\Repositories\Repository\CarRepository;
use App\Repositories\Repository\CityRepository;
use App\Repositories\Repository\CommentRepository;
use App\Repositories\Repository\PaymentRepository;
use App\Repositories\Repository\SeatRepository;
use App\Repositories\Repository\TripRepository;
use App\Repositories\Repository\TripServiceRepository;
use App\Repositories\Repository\UserRepository;
use App\Repositories\Repository\TripDetailRepository;

use App\Repositories\RepositoryInterface\BlogRepositoryInterface;
use App\Repositories\RepositoryInterface\CommentRepositoryInterface;
use App\Repositories\RepositoryInterface\PaymentRepositoryInterface;
use App\Repositories\RepositoryInterface\SeatRepositoryInterface;
use App\Repositories\RepositoryInterface\TripServiceRepositoryInterface;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use App\Repositories\RepositoryInterface\CityRepositoryInterface;
use App\Repositories\RepositoryInterface\TripRepositoryInterface;
use App\Repositories\RepositoryInterface\CarRepositoryInterface;
use App\Repositories\RepositoryInterface\TripDetailRepositoryInterface;

use App\Service\BlogService;
use App\Service\CityService;
use App\Service\CommentService;
use App\Service\PaymentService;
use App\Service\TripService;
use App\Service\CarService;
use App\Service\ImageService;
use App\Service\UserService;
use App\Service\ServiceForTripService;
use Illuminate\Support\ServiceProvider;
use App\Service\SeatService;
use App\Service\TripDetailService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CarService::class, function ($app) {
            return new CarService(
                $app->make('App\Repositories\Repository\CarRepository'),
                $app->make(ImageService::class),
            );
        });

        $this->app->bind(TripService::class, function ($app) {
            return new TripService(
                $app->make('App\Repositories\Repository\TripRepository'),
            );
        });

        $this->app->bind(CityService::class, function ($app) {
            return new CityService($app->make('App\Repositories\Repository\CityRepository'));
        });

        $this->app->bind(ServiceForTripService::class, function ($app) {
            return new ServiceForTripService($app->make('App\Repositories\Repository\TripServiceRepository'));
        });

        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make('App\Repositories\Repository\UserRepository'));
        });

        $this->app->bind(SeatService::class, function ($app) {
            return new SeatService($app->make('App\Repositories\Repository\SeatRepository'));
        });

        $this->app->bind(PaymentService::class, function ($app) {
            return new PaymentService($app->make('App\Repositories\Repository\PaymentRepository'));
        });

        $this->app->bind(CommentService::class, function ($app) {
            return new CommentService($app->make('App\Repositories\Repository\CommentRepository'));
        });

        $this->app->bind(BlogService::class, function ($app) {
            return new BlogService(
                $app->make('App\Repositories\Repository\BlogRepository'),
                $app->make(ImageService::class),
            );
        });

        $this->app->bind(TripDetailService::class, function ($app) {
            return new TripDetailService(
                $app->make('App\Repositories\Repository\TripDetailRepository'),
                $app->make(TripService::class),
                $app->make(SeatService::class),
                $app->make(PaymentService::class),
            );
//            $repository = $app->make('App\Repositories\Repository\TripDetailRepository');
//            return new TripDetailService($repository);
        });


        $this->app->singleton(ImageService::class, function ($app) {
            return new ImageService();
        });
    }

    public $bindings = [
        UserRepositoryInterface::class => UserRepository::class,
        CityRepositoryInterface::class => CityRepository::class,
        TripRepositoryInterface::class => TripRepository::class,
        CarRepositoryInterface::class => CarRepository::class,
        TripServiceRepositoryInterface::class => TripServiceRepository::class,
        SeatRepositoryInterface::class => SeatRepository::class,
        TripDetailRepositoryInterface::class => TripDetailRepository::class,
        PaymentRepositoryInterface::class => PaymentRepository::class,
        BlogRepositoryInterface::class => BlogRepository::class,
        CommentRepositoryInterface::class => CommentRepository::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        view()->composer('home', function ($view){
            $trips = Trip::query()->orderBy('time_start', 'desc')
                ->where('time_start', '>', strtotime(now()))->get();
            $admin = User::find(2);
            $blogs = Blog::all();
            view()->share([
                'blogs' => $blogs,
                'admin' => $admin,
                'trips'=> $trips,
            ]);
        });

        view()->composer('customer.trip.all_trips', function ($view){
            $cities = City::all();
            view()->share([
                'cities' => $cities,
            ]);
        });
    }
}
