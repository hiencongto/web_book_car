<?php
namespace App\Repositories\Repository;

use App\Mail\ConfirmAccountMail;
use App\Models\User;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateUserRequest;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Mail;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function logicCreate($data = [])
    {
        // TODO: Implement logicCreate() method.
    }

    public function check()
    {
        $query = $this->model;
    }

    /**
     * customer or driver createHandle
     *
     * @param CreateUserRequest $request
     * @param string|null $role
     * @return mixed|null
     */
    public function createWithRole(CreateUserRequest $request, string $role = null)
    {
        $confirmToken = rand(100000,999999);

        // create customer
        if ($role == 'customer')
        {
            $data = [
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'role' =>  CommonConstant::ROLE['customer'],
                'confirm_token' => $confirmToken,
                'status_id' => CommonConstant::STATUS_ID['user_unverified'],
            ];
        }
        // create driver
        elseif ($role == 'driver')
        {
            $data = [
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'role' => CommonConstant::ROLE['driver'],
                'confirm_token' => $confirmToken,
                'ID_number' => $request->ID_number,
                'status_id' => CommonConstant::STATUS_ID['user_unverified'],
            ];
        }
        else return null;

        $detailsEmail = [
            'email' => $request->email,
            'confirmToken' => $confirmToken,
        ];

        Mail::to($request->email)->send(new ConfirmAccountMail($detailsEmail));

        return $this->model->create($data) ?? null;
    }

    public function activeAccountByConfirmToken(string $email, int $confirmToken)
    {
        $user = $this->model
            ->where('email', $email)
            ->where('confirm_token', $confirmToken)
            ->first();

        // Kiểm tra nếu user tồn tại trước khi truy cập thuộc tính
        if ($user && $user->status_id == CommonConstant::STATUS_ID['user_unverified']) {
            // Cập nhật trực tiếp đối tượng user đã được tìm thấy
            $update = $user->update([
                'status_id' => CommonConstant::STATUS_ID['user_active'],
            ]);

            if ($update) {
                return true;
            }
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getAllDriver()
    {
        return $this->model->where('role', CommonConstant::ROLE['driver'])->get();
    }

    public function getUserStatus($email)
    {
        return $this->model->where('email', $email)->first(['status_id']);
    }

    public function query()
    {
        return User::query();
    }
}

