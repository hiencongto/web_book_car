<?php
 namespace App\Http\Controllers;

 use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateProfileAdminRequest;
use App\Mail\ConfirmAccountMail;
use App\Service\TripDetailService;
use App\Service\TripService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Constants\CommonConstant;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use App\Repositories\RepositoryInterface\CityRepositoryInterface;
use JetBrains\PhpStorm\NoReturn;
use App\Service\UserService;
use App\Service\CityService;

class UserController extends Controller
 {
     /**
      * @return \Closure|\Illuminate\Container\Container|mixed|object|null
      */
     protected $userRepository;
     protected $cityRepository;
     protected $cityService;
     protected $userService;
     protected $tripService;
     protected $tripDetailService;

     function __construct(
         UserRepositoryInterface $userRepository,
         CityRepositoryInterface $cityRepository,
         CityService $cityService,
         UserService $userService,
         TripService $tripService,
         TripDetailService $tripDetailService,
     )
     {
         $this->userRepository = $userRepository;
         $this->cityRepository = $cityRepository;
         $this->cityService = $cityService;
         $this->userService = $userService;
         $this->tripService = $tripService;
         $this->tripDetailService = $tripDetailService;
     }

     public function customerHome()
     {
         $cities = $this->cityService->getAllCity();

         return view('home',compact('cities'));
     }

     public function showLogin()
     {
         return view('auth.login');
     }

     public function showRegister()
     {
         return view('auth.register');
     }

     public function showDriverRegister()
     {
         return view('auth.driver-register');
     }

     public function showConfirmEmail(){
         return view('auth.confirm_email_code');
     }

    /**
     * @param CreateUserRequest $request
     * @return mixed
     */
     public function createUser(CreateUserRequest $request)
     {
         if(URL::current() == route('show_register'))
         {
             $user = $this->userRepository->createWithRole($request, 'customer');
         }
         elseif (URL::current() == route('show_driver_register'))
         {
             $user = $this->userRepository->createWithRole($request, 'driver');
         }
         else $user = null;

         if (!$user)
         {
             return redirect()->back()->with([
                CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create'],
             ]);
         }

         return redirect()->route('show_confirm_email');
     }

    /**
     * @return mixed
     */
     public function activeAccountByConfirmToken()
     {
         $email = $_GET['email'];
         $confirmToken = (int) $_GET['confirmToken'];

         $user = $this->userRepository->activeAccountByConfirmToken($email, $confirmToken);

         if ($user){
             return redirect()->route('show_login')
                 ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_update']]);
         }
         return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update']]);
     }


     public function showChangePassword()
     {
         return view('auth.change_password');
     }
     public function changePassword(ChangePasswordRequest $request)
     {
         dd($request);
     }

    /**
     * @param Request $request
     * @return mixed
     */
     public function checkLogin(Request $request)
     {
         $result = $this->userService->checkLogin($request);

         if ($result['status']) {
             $user = \Illuminate\Support\Facades\Auth::guard('user')->user();
             if ($user->role == CommonConstant::ROLE['customer'])
             {
                 return redirect()->route('customer_home');
             }
             else if ($user->role == CommonConstant::ROLE['admin'])
             {
                 return redirect()->route('list_user');
             }
             else{
                 return redirect()->route('list_trip_driver');
             }
         }

         return redirect()->back()->with(['message' => $result['message']]);
     }

    /**
     * @return mixed
     */
     public function userLogout()
     {

         Auth::guard('user')->logout();

         return redirect()->route('guess_home')->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_status']]);
     }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
     public function userDashboard()
     {
         $user =Auth::guard('user')->user();
         $user_id = $user->id;
         $trip_details = $this->tripDetailService->findTripDetailByUserId($user_id);
         return view('customer.dashboard.user_dashboard', compact('user', 'trip_details'));
     }

    public function showResetPassword()
    {
        return view('auth.change_password');
    }

     public function resetPassword(Request $request)
     {
         try {
             $this->userService->resetPassword($request);

             return redirect()->route('show_confirm_email');
         }
         catch (\Exception $exception)
         {

         }
     }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|void|null
     */
     public function showFormNewPassword()
     {
         try {
             $resetToken = Session::get('resetToken');
             $email = $_GET['email'];

             if ($resetToken == $_GET['resetToken'])
             {
                 return view('auth.form_new_password', compact('email'));
             }
         }
         catch (\Exception $exception)
         {
             return redirect()->route('page-404');
         }
     }

    /**
     * @param ChangePasswordRequest $request
     * @return mixed
     */
     public function updateNewPassword(ChangePasswordRequest $request)
     {
         $user = $this->userService->updateNewPassword($request);
         if ($user)
         {
             return redirect()->route('show_login');
         }

         return redirect()->route('page-404');
     }
    /*
    * ----------------------------D-----
    * ADMIN
    * ---------------------------------
    */

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
     public function showListUsersForAdmin()
     {
         $users = $this->userRepository->query()->paginate(5);

         return view('admin.user.all_users', compact('users'));
     }

     public function showAddDriverForAdmin()
     {
         return view('admin.user.add_new_driver');
     }

    /**
     * @param CreateUserRequest $request
     * @return mixed
     */
     public function createDriverForAdmin(CreateUserRequest $request)
     {
         $user = $this->userRepository->createWithRole($request, 'driver');

         if (!$user)
         {
             return redirect()->back()->with([
                 CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create'],
             ]);
         }

         return redirect()->route('list_user');
     }

    /**
     * @param $id
     * @return mixed
     */
    public function showUpdateUserForAdmin( $id)
    {
        try {
            $user = $this->userRepository->find($id);

            if(!$user)
            {
                return redirect()->back()->with(CommonConstant::STATUS_MSG_ARRAY['fail_find']);
            }
            return view('admin.user.edit_user', compact('user'))->with('activeRouteUpdateUser', 'update_user_admin');
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function updateUserForAdmin(Request $request, $id)
    {
        try {
            $user = $this->userRepository->find($id);

            if (!$user)
            {
                return redirect()->back()->with([
                    CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find'],
                ]);
            }

            if ($request->role != $user->role)
            {
                if (!$this->userRepository->update($id, ['role' => $request->role]))
                {
                    return redirect()->back()->with([
                        CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update'],
                    ]);
                }
            }

            if ($request->status_id != $user->status_id)
            {
                if (!$this->userRepository->update($id, ['status_id' => $request->status_id]))
                {
                    return redirect()->back()->with([
                        CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update'],
                    ]);
                }
            }

            return redirect()->route('list_user')->with([
                CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_update'],
            ]);
        }
        catch (\Exception $exception)
        {
            return view('admin.404_admin');
        }
    }

    /**
     * @param Request $request
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function filterUserForAdmin( Request $request)
    {
        try {
            $users = $this->userService->filterUserForAdmin($request);
            $role = $request->role;
            $status = $request->status;
            $email = $request->email;

            if ($users)
            {
                return view('admin.user.all_users', compact('users','role', 'status', 'email' ));
            }
            else return redirect()->back()
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        } catch (\Exception $e) {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|void|null
     */
    public function showProfileForAdmin()
    {
        try {
            $user =Auth::guard('user')->user();
            if ($user)
            {
                return view('admin.profile.profile_admin', compact('user'));
            }
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @param UpdateProfileAdminRequest $request
     * @return mixed
     */
    public function updateProfileAdmin(UpdateProfileAdminRequest $request)
    {
        try {
            $user =Auth::guard('user')->user();
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ];

            $user = $this->userService->update($user->id, $data);

            if ($user)
            {
                return redirect()->route('profile_admin', compact('user'));
            }
            return redirect()->back();
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|void|null
     */
    public function showProfileForDriver()
    {
        try {
            $user =Auth::guard('user')->user();
            if ($user)
            {
                return view('driver.update_profile_driver', compact('user'));
            }
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @param UpdateProfileAdminRequest $request
     * @return mixed
     */
    public function updateProfileDriver(UpdateProfileAdminRequest $request)
    {
        try {
            $user =Auth::guard('user')->user();
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ];

            $user = $this->userService->update($user->id, $data);

            if ($user)
            {
                return redirect()->route('profile_driver', compact('user'));
            }
            return redirect()->back();
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }
 }
 ?>



