<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Events\PaymentMade;
use App\Models\Order;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Event;

class EventTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $order = new Order;
        $order->id = 1000;
        $order->bl_release_date = null;
        $order->bl_release_user_id = 1;
        $order->freight_payer_self = true;
        $order->contract_number = "hdghshdjs";
        $order->bl_number = "jscjnns";

        event(new PaymentMade($order));
    }
}
