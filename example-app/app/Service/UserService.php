<?php

namespace App\Service;

use App\Constants\CommonConstant;
use App\Http\Requests\ChangePasswordRequest;
use App\Mail\ForgotPasswordMail;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\password;

class UserService
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getUserById(int $id)
    {
        return $this->userRepository->find($id);
    }

    /**
     * @return mixed
     */
    public function getAllDriver()
    {
        return $this->userRepository->getAllDriver();
    }

    /**
     * @param int $time_start
     * @param int $time_end
     * @return array
     */
    public function getDriverNotBusy(int $time_start, int $time_end)
    {
        $drivers = $this->userRepository->getAllDriver();
        $driversNotBusy = [];

        foreach ($drivers as $driver)
        {
            //Kiểm tra tài xế có active không
            if ($driver->status_id !== CommonConstant::STATUS_ID['user_active'])
            {
                continue;
            }

            $isBusy = false;
            $tripsOfDriver = $driver->trips;

            foreach ($tripsOfDriver as $tripOfDriver)
            {
                if ($tripOfDriver->status_id !== CommonConstant::STATUS_ID['trip_finished'] &&
                    $tripOfDriver->status_id !== CommonConstant::STATUS_ID['trip_cancel'] &&
                    !($time_end < $tripOfDriver->time_start || $tripOfDriver->time_end <= $time_start))
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
                $driversNotBusy[] = $driver;
            }
        }

        return $driversNotBusy;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function checkLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials))
        {;

            $userStatus = $this->userRepository->getUserStatus($request->email);

            if ($userStatus->status_id == CommonConstant::STATUS_ID['user_unverified'])
            {
                Auth::logout();

                return ['status' => false, 'message' => CommonConstant::STATUS_MSG_ARRAY['request_verify_account']];
            }

            if ($userStatus->status_id == CommonConstant::STATUS_ID['user_locked'])
            {
                Auth::logout();

                return ['status' => false, 'message' => CommonConstant::STATUS_MSG_ARRAY['request_unlock_account']];
            }

            return ['status' => true, 'message' => CommonConstant::STATUS_MSG_ARRAY['success_sign_in']];
        }

        return ['status' => false, 'message' => CommonConstant::STATUS_MSG_ARRAY['fail_login']];
    }

    /**
     * @param Request $request
     * @return false|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function filterUserForAdmin(Request $request)
    {
        try {
            $role = (int) $request->role;
            $status = (int) $request->status;
            $email = $request->email;

            $users = $this->userRepository->query()
                ->when($role, function ($query, $role) {
                    return $query->where('role', $role);
                })
                ->when($status, function ($query, $status) {
                    return $query->where('status_id', $status);
                })
                ->when($email, function ($query, $email) {
                    return $query->where('email', 'like', "%$email%");
                })
                ->paginate(5);

            return $users;
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param $id
     * @param $data
     * @return false|mixed
     */
    public function update($id, $data = [])
    {
        try {
            return $this->userRepository->update($id, $data);
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function resetPassword(Request $request)
    {
        Session::put('resetToken', $request->_token);

        $dataMail = [
          'email' => $request->email,
          'resetToken' => $request->_token,
        ];

        Mail::to($request->email)->send(new ForgotPasswordMail($dataMail));

    }

    /**
     * @param ChangePasswordRequest $request
     * @return false|int
     */
    public function updateNewPassword(ChangePasswordRequest $request)
    {
        try {
            $data = [
                'password' => bcrypt($request->password),
            ];

            $user = $this->userRepository->query()->where('email', $request->email)
                ->update($data);

            return $user;
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }
}
