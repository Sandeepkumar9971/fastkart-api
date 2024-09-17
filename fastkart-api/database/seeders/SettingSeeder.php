<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $currency_id = Currency::where('status', true)->first()->id;
        $values = [
            'general' => [
                'light_logo_image_id' => Helpers::getAttachmentId('logo-white.png'),
                'dark_logo_image_id' => Helpers::getAttachmentId('logo-dark.png'),
                'tiny_logo_image_id' => Helpers::getAttachmentId('tiny-logo.png'),
                'favicon_image_id' => Helpers::getAttachmentId('favicon.png'),
                'site_title' => 'FastKart Marketplace: Where Vendors Shine Together',
                'site_tagline' => "Shop Unique, Sell Exceptional – FastKart's Multi-Vendor Universe.",
                'default_timezone' => 'Asia/Kolkata',
                'default_currency_id' => $currency_id,
                'admin_site_language_direction' => 'ltr',
                'min_order_amount' => 0,
                'min_order_free_shipping' => 50,
                'product_sku_prefix' => 'FS',
                'mode' => 'light-only',
                'copyright' => 'Copyright 2023 © Fastkart theme by pixelstrapp',
            ],
            'activation' => [
                'multivendor' => true,
                'point_enable' => true,
                'coupon_enable' => true,
                'wallet_enable' => true,
                'stock_product_hide' => false,
                'store_auto_approve' => true,
                'product_auto_approve' => true,
            ],
            'wallet_points' => [
                'signup_points' => 100,
                'min_per_order_amount' => 100,
                'point_currency_ratio' => 30,
                'reward_per_order_amount' => 10,
            ],
            'vendor_commissions' => [
                'status' => true,
                'min_withdraw_amount' => 500,
                'default_commission_rate' => 10,
                'is_category_based_commission' => true,
            ],
            'email' => [
                'mail_host' => '',
                'mail_port' => '',
                'mail_mailer' => 'smtp',
                'mail_username' => '',
                'mail_password' => '',
                'mail_encryption' => '',
                'mail_from_name' => 'no-reply',
                'mail_from_address' => '',
                'mailgun_domain' => null,
                'mailgun_secret' => null
            ],
            'refund' => [
                'status' => true,
                "refundable_days" => 7,
            ],
            'newsletter' => [
                'status' => false,
                'mailchip_api_key' => '',
                'mailchip_list_id' => '',
            ],
            'delivery' => [
                'default_delivery'=> 1,
                'default' => [
                    'title' => 'Standard Delivery',
                    'description' => 'Approx 5 to 7 Days'
                ],
                'same_day_delivery' => true,
                'same_day' => [
                    'title' => 'Express Delivery',
                    'description' => 'Schedule'
                ],
                'same_day_intervals' => [
                    [
                        'title' => 'Morning',
                        'description' => '8.00 AM - 12.00 AM',
                    ],
                    [
                        'title' => 'Noon',
                        'description' => '12.00 PM - 2.00 PM'
                    ],
                    [
                        'title' => 'Afternoon',
                        'description' => '02.00 PM - 05.00 PM',
                    ],
                    [
                        'title' => 'Evening',
                        'description' => '05.00 PM - 08.00 PM'
                    ]
                ]
            ],
            'payment_methods' => [
                'paypal' => [
                    'status' => false,
                    'client_id' => '',
                    'client_secret' => '',
                    'sandbox_mode' => false,
                ],
                'stripe' => [
                    'key' => '',
                    'secret' => '',
                    'status' => false
                ],
                'razorpay' => [
                    'key' => '',
                    'secret' => '',
                    'status' => false
                ],
                'mollie' => [
                    'secret_key' => '',
                    'status' => false,
                ],
                'cod' => [
                    'status' => true
                ]
            ],
            'maintenance' => [
                'title' => "We'll be back Soon..",
                'maintenance_mode' => false,
                'maintenance_image_id' => Helpers::getAttachmentId('maintainance.jpg'),
                'description' => "We are busy to updating our store for you."
            ]
        ];

        Setting::updateOrCreate(['values' => $values]);
        DB::table('seeders')->updateOrInsert([
            'name' => 'SettingSeeder',
            'is_completed' => true
        ]);
    }
}
