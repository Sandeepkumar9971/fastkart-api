<?php

namespace App\Repositories\Eloquents;

use Exception;
use App\Models\Order;
use App\Payments\Mollie;
use App\Payments\Paypal;
use App\Payments\Stripe;
use App\Payments\RazorPay;
use App\GraphQL\Exceptions\ExceptionHandler;
use Prettus\Repository\Eloquent\BaseRepository;

class WebhookRepository extends BaseRepository
{
    function model()
    {
        return Order::class;
    }

    public function paypal($request)
    {
        try {

            return Paypal::webhookHandler($request);

        } catch (Exception $e){

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function stripe($request)
    {
        try {

            return Stripe::webhookHandler($request);

        } catch (Exception $e){

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function mollie($request)
    {
        try {

            return Mollie::webhookHandler($request);

        } catch (Exception $e){

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function razorpay($request)
    {
        try {

            return RazorPay::webhookHandler($request);

        } catch (Exception $e){

            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }
}
