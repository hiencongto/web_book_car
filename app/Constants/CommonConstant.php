<?php
namespace App\Constants;

class CommonConstant
{
    const MSG = 'msg';
    const ROLE = [
        'admin' => 0,
        'customer' => 1,
        'driver' => 2,
    ];
    const STATUS_ID = [
        'user_unverified' => 101,
        'user_active' => 102,
        'user_locked' => 103,
        'trip_waiting' => 201,
//        'trip_picking' => 202,
        'trip_on_trip' => 203,
        'trip_finished' => 204,
        'trip_cancel' => 205,
        'trip_detail_pending' => 301,
//        'trip_detail_waiting' => 302,
        'trip_detail_picking_up' => 303,
//        'trip_detail_picked' => 304,
        'trip_detail_dropped_off' => 305,
        'trip_detail_cancel' => 306,
        'car_unverified' => 401,
        'car_active' => 402,
        'car_frozen' => 403,
        'provider_unverified' => 501,
        'provider_active' => 502,
        'provider_locked' => 503,
        'sold' => 601,
        'available' => 602,
        'selected' => 603,
    ];

    const STATUS_MSG_ARRAY =[
        'fail_create' => 'Error! Can not create',
        'fail_find' => 'Error! Can not find this item',
        'fail_update' => 'Error! Can not update this item',
        'fail_delete' => 'Error! Can not delete this item',
        'fail_restore' => 'Error! Can not restore this item',
        'success_create' => 'Success! This item created',
        'success_find' => 'Success! This item found',
        'success_update' => 'Success! This item updated',
        'success_delete' => 'Success! This item deleted',
        'success_restore' => 'Success! This item restored',
        'fail_status' => 'Error! Can not recognize status',
        'success_status' => 'Error! This item has been update status',
        'fail_status_code' => '200',
        'success_status_code' => '404',
        'fail_start_trip' => 'Can not start trip!',
        'fail_find_active_trip' => 'You have no active trip currently',
        'fail_end_trip' => 'Can not end trip!',
        'fail_verify_account' => 'Can not verify your account!',
        'verify_email_expired' => 'Verification email expired',
        'success_verify_account' => 'Your account has been verified!',
        'success_resend_email' => 'Resend verification email successfully!',
        'request_verify_account' => 'You must verify your account before continuing!',
        'request_unlock_account' => 'You account locking now. You must unlock your account before continuing!',
        'fail_login' => 'Login information is incorrect!',
        'fail_password' => 'Old password is incorrect!',
        'fail_add_customer' => 'Error! Can not add customer to the trip request!',
        'success_add_customer' => 'Successfully add customer to the trip request!',
        'fail_accept_customer' => 'Error! Can not accept customer to join the trip!',
        'success_accept_customer' => 'Successfully accept customer to join the trip!',
        'success_decline_customer' => 'Successfully decline customer request from the trip!',
        'fail_cancel_trip_detail' => 'Your trip request not in pending status!',
        'success_sign_in' => 'Successfully sign in!',
        'fail_sign_in' => 'Failed to sign in! Your data is invalid!',
        'success_get_data' => 'Successfully get data!',
        'fail_get_data' => 'Failed to get data!',
        'fail_soft_delete_provider' => 'The provider cannot be deleted because it has %s unfinished trips.'
    ];

    public const SERVICE_ID = [
        'wifi' => 4,
        'media' => 3,
        'bed' => 1,
        'food' => 2,
        'charging port' => 5,
    ];

    public const SERVICE_TITLE = [
        4 => 'wifi',
        3 => 'media',
        1 => 'bed',
        2 => 'food',
        5 => 'charging port',
    ];
}

