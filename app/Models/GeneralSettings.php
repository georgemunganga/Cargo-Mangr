<?php

namespace App\Models;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public $company_name;
    public $website_title;
    public $website_description;
    public $website_keywords;
    public $website_logo;
    public $system_logo;
    public $loading_logo;
    public $login_page_logo;
    public $social_image;
    public $maintenance_mode;
    public $enable_refund_payments;
    public $allow_client_refunds;
    public $timezone;
    public $current_version;
    public $active_theme;
    public $base_country_code;

    public static function fields(): array
    {
        $settings = app(GeneralSettings::class);

        $fields = [
            'company_name'     =>   [
                'label'         =>  'settings.company_name',
                'translatable'  =>  true,
                'type'          =>  'string',
                'value'         =>  json_decode($settings->company_name, true),
                'required'      =>  true
            ],
            'system_logo'     =>   [
                'label'         =>  'settings.system_logo',
                'translatable'  =>  false,
                'type'          =>  'image',
                'value'         =>  $settings->system_logo,
                'required'      =>  false
            ],
            'loading_logo'     =>   [
                'label'         =>  'settings.loading_logo',
                'translatable'  =>  false,
                'type'          =>  'image',
                'value'         =>  $settings->loading_logo,
                'required'      =>  false
            ],
            'login_page_logo'     =>   [
                'label'         =>  'settings.login_page_logo',
                'translatable'  =>  false,
                'type'          =>  'image',
                'value'         =>  $settings->login_page_logo,
                'required'      =>  false
            ],
            'website_title'     =>   [
                'label'         =>  'settings.website_title',
                'translatable'  =>  true,
                'type'          =>  'string',
                'value'         =>  json_decode($settings->website_title, true),
                'required'      =>  true
            ],
            'website_description'     =>   [
                'label'         =>  'settings.website_description',
                'translatable'  =>  true,
                'type'          =>  'text',
                'value'         =>  json_decode($settings->website_description, true),
                'required'      =>  false
            ],
            'website_keywords'     =>   [
                'label'         =>  'settings.website_keywords',
                'translatable'  =>  true,
                'type'          =>  'text',
                'value'         =>  json_decode($settings->website_keywords, true),
                'required'      =>  false
            ],
            'website_logo'     =>   [
                'label'         =>  'settings.website_logo',
                'translatable'  =>  false,
                'type'          =>  'image',
                'value'         =>  $settings->website_logo,
                'required'      =>  false
            ],
            'social_image'     =>   [
                'label'         =>  'settings.social_image',
                'translatable'  =>  false,
                'type'          =>  'image',
                'value'         =>  $settings->social_image,
                'required'      =>  false
            ],
            'maintenance_mode'     =>   [
                'label'         =>  'settings.maintenance_mode',
                'translatable'  =>  false,
                'value'         =>  $settings->maintenance_mode,
                'type'          =>  'bool',
                'required'      =>  false
            ],
            'enable_refund_payments' => [
                'label'         =>  'settings.enable_refund_payments',
                'translatable'  =>  false,
                'value'         =>  $settings->enable_refund_payments,
                'type'          =>  'bool',
                'required'      =>  false
            ],
            'allow_client_refunds' => [
                'label'         =>  'settings.allow_client_refunds',
                'translatable'  =>  false,
                'value'         =>  $settings->allow_client_refunds,
                'type'          =>  'bool',
                'required'      =>  false
            ],
            'timezone'     =>   [
                'label'         =>  'settings.timezone',
                'translatable'  =>  false,
                'type'          =>  'select',
                'options'       =>  array(
                                        '1'  =>  "(UTC-12:00) International Date Line West",
                                        '2'  =>  "(UTC-11:00) Coordinated Universal Time-11",
                                        '3'  =>  "(UTC-10:00) Hawaii",
                                        '4'  =>  "(UTC-09:00) Alaska",
                                        '5'  =>  "(UTC-07:00) Pacific Time (US & Canada)",
                                        '6'  =>  "(UTC-08:00) Pacific Time (US & Canada)",
                                        '7'  =>  "(UTC-06:00) Central America",
                                        '8'  =>  "(UTC-06:00) Central Time (US & Canada)",
                                        '9'  =>  "(UTC-05:00) Eastern Time (US & Canada)",
                                        '10' =>  "(UTC-04:30) Caracas",
                                        '11' =>  "(UTC-03:30) Newfoundland",
                                        '12' =>  "(UTC-03:00) Brasilia",
                                        '13' =>  "(UTC-02:00) Coordinated Universal Time-02",
                                        '14' =>  "(UTC-02:00) Mid-Atlantic - Old",
                                        '15' =>  "(UTC) Casablanca",
                                        '16' =>  "(UTC) Edinburgh, London",
                                        '16' =>  "(UTC+01:00) Edinburgh, London",
                                        '17' =>  "(UTC+01:00) West Central Africa",
                                        '18' =>  "(UTC+01:00) Windhoek",
                                        '19' =>  "(UTC+02:00) Athens, Bucharest",
                                        '20' =>  "(UTC+02:00) Beirut",
                                        '21' =>  "(UTC+02:00) Cairo",
                                        '21' =>  "(UTC+02:00) Damascus",
                                        '22' =>  "(UTC+02:00) E. Europe",
                                        '23' =>  "(UTC+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius",
                                        '24' =>  "(UTC+03:00) Istanbul",
                                        '25' =>  "(UTC+02:00) Jerusalem",
                                        '26' =>  "(UTC+03:00) Amman",
                                        '27' =>  "(UTC+03:00) Baghdad",
                                        '28' =>  "(UTC+02:00) Kaliningrad",
                                        '29' =>  "(UTC+03:00) Kuwait, Riyadh",
                                        '30' =>  "(UTC+03:00) Nairobi",
                                        '31' =>  "(UTC+03:00) Moscow, St. Petersburg, Volgograd, Minsk",
                                        '32' =>  "(UTC+04:00) Samara, Ulyanovsk, Saratov",
                                        '33' =>  "(UTC+03:30) Tehran",
                                        '34' =>  "(UTC+04:00) Abu Dhabi, Muscat",
                                        '35' =>  "(UTC+04:00) Baku",
                                        '36' =>  "(UTC+04:00) Port Louis",
                                        '37' =>  "(UTC+04:00) Tbilisi",
                                        '38' =>  "(UTC+04:00) Yerevan",
                                        '39' =>  "(UTC+04:30) Kabul",
                                        '40' =>  "(UTC+05:00) Ashgabat, Tashkent",
                                        '41' =>  "(UTC+05:00) Yekaterinburg",
                                        '42' =>  "(UTC+05:00) Islamabad, Karachi",
                                        '43' =>  "(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi",
                                        '44' =>  "(UTC+05:30) Sri Jayawardenepura",
                                        '45' =>  "(UTC+05:45) Kathmandu",
                                        '46' =>  "(UTC+06:00) Nur-Sultan (Astana",
                                        '47' =>  "(UTC+06:00) Dhaka",
                                        '48' =>  "(UTC+06:30) Yangon (Rangoon",
                                        '49' =>  "(UTC+07:00) Bangkok, Hanoi, Jakarta",
                                        '50' =>  "(UTC+07:00) Novosibirsk",
                                        '51' =>  "(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi",
                                        '52' =>  "(UTC+08:00) Krasnoyarsk",
                                        '53' =>  "(UTC+08:00) Kuala Lumpur, Singapore",
                                        '54' =>  "(UTC+08:00) Perth",
                                        '55' =>  "(UTC+08:00) Taipei",
                                        '56' =>  "(UTC+08:00) Ulaanbaatar",
                                        '57' =>  "(UTC+08:00) Irkutsk",
                                        '58' =>  "(UTC+09:00) Osaka, Sapporo, Tokyo",
                                        '59' =>  "(UTC+09:00) Seoul",
                                        '60' =>  "(UTC+09:30) Adelaide",
                                        '61' =>  "(UTC+09:30) Darwin",
                                        '62' =>  "(UTC+10:00) Brisbane",
                                        '63' =>  "(UTC+10:00) Canberra, Melbourne, Sydney",
                                        '64' =>  "(UTC+10:00) Guam, Port Moresby",
                                        '65' =>  "(UTC+10:00) Hobart",
                                        '66' =>  "(UTC+09:00) Yakutsk",
                                        '67' =>  "(UTC+11:00) Solomon Is., New Caledonia",
                                        '68' =>  "(UTC+11:00) Vladivostok",
                                        '69' =>  "(UTC+12:00) Auckland, Wellington",
                                        '70' =>  "(UTC+12:00) Coordinated Universal Time+12",
                                        '71' =>  "(UTC+12:00) Fiji",
                                        '72' =>  "(UTC+12:00) Magadan",
                                        '73' =>  "(UTC+12:00) Petropavlovsk-Kamchatsky - Old",
                                        '74' =>  "(UTC+13:00) Nuku'alofa",
                                        '75' =>  "(UTC+13:00) Samoa",
                                        '76' => "(UTC+02:00) Cairo", 
                                    ),
                'value'         =>  $settings->timezone,
                'required'      =>  true
            ],
            'current_version'     =>   [
                'label'         =>  '',
                'translatable'  =>  true,
                'type'          =>  'hidden',
                'value'         =>  $settings->current_version,
                'required'      =>  true
            ],
            'active_theme'     =>   [
                'label'         =>  '',
                'translatable'  =>  true,
                'type'          =>  'hidden',
                'value'         =>  $settings->active_theme,
                'required'      =>  true
            ],
            'base_country_code'     =>   [
                'label'         =>  'country code',
                'translatable'  =>  false,
                'type'          =>  'number',
                'value'         =>  $settings->base_country_code,
                'required'      =>  true
            ],
        ];

        return $fields;
    }
    
    public static function group(): string
    {
        return 'general';
    }
    
    public static function encrypted(): array
    {
        return [
            
        ];
    }
}
