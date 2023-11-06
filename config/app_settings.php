<?php

return [
    'sections' => [
        'app' => [
            'title' => 'Общие настройки',
            'descriptions' => 'Общие настройки приложения.', // (optional)
            'icon' => 'fa fa-cog', // (optional)

            'inputs' => [
                [
                    'name' => 'app_name', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Слоган сайта', // label for input
                    // optional properties
                    'placeholder' => 'Application Name', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'style' => '', // any inline styles
                    'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => env('APP_NAME'), // any default value
                    'hint' => 'Здесь вы можете установить название приложения' // help block text for input
                ],
                [
                    'name' => 'check_contain',
                    'type' => 'boolean',
                    'label' => 'Включить замену совпадения',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'required|boolean',
                    'value' => 1,
                    'true_value' => 1,
                    'false_value' => 0,
                ],
                [
                    'name' => 'show_share_buttons',
                    'type' => 'boolean',
                    'label' => 'Включить кнопки поделиться',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'required|boolean',
                    'value' => 1,
                    'true_value' => 1,
                    'false_value' => 0,
                ],

//                [
//                    'name' => 'logo',
//                    'type' => 'image',
//                    'label' => 'Upload logo',
//                    'hint' => 'Must be an image and cropped in desired size',
//                    'rules' => 'image|max:500',
//                    'disk' => 'public', // which disk you want to upload
//                    'path' => 'app', // path on the disk,
//                    'preview_class' => 'thumbnail',
//                    'preview_style' => 'height:40px'
//                ]
            ]
        ],
        'keys' => [
            'title' => 'Ключи от сторонних приложений',
            'icon' => 'fa fa-key', // (optional)

            'inputs' => [
                [
                    'name' => 'ip_geolocation_api_key',
                    'type' => 'text',
                    'label' => 'IP Geolocation Api',
                    'class' => 'form-control',
                    'rules' => 'nullable',
                    'value' => env('IP_GEOLOCATION_API'),
                    'hint' => 'Апи для обнаружение геолокацию пользователя'
                ],
            ]
        ],
        'link' => [
            'title' => 'Ссылки',
            'icon' => 'fa fa-link',

            'inputs' => [
                [
                    'name' => 'referral_link',
                    'type' => 'text',
                    'label' => 'Реферальная ссылка',
                    'placeholder' => env('APP_URL') . '?ref=123',
                    'rules' => 'nullable|string|min:2|max:191',
                ],
                [
                    'name' => 'facebook_url',
                    'type' => 'text',
                    'label' => 'Facebook',
                    'placeholder' => 'https://www.facebook.com/',
                    'value' => 'https://www.facebook.com/',
                    'rules' => 'nullable|string|min:2|max:191',
                ],
                [
                    'name' => 'twitter_url',
                    'type' => 'text',
                    'label' => 'Twitter',
                    'placeholder' => 'https://twitter.com',
                    'value' => 'https://twitter.com',
                    'rules' => 'nullable|string|min:2|max:191',
                ],
                [
                    'name' => 'google_url',
                    'type' => 'text',
                    'label' => 'Google',
                    'placeholder' => 'https://google.com',
                    'value' => 'https://google.com',
                    'rules' => 'nullable|string|min:2|max:191',
                ],
                [
                    'name' => 'pinterest_url',
                    'type' => 'text',
                    'label' => 'Pinterest',
                    'placeholder' => 'https://pinterest.com',
                    'value' => 'https://pinterest.com',
                    'rules' => 'nullable|string|min:2|max:191',
                ],
            ]
        ],
        'seo' => [
            'title' => 'SEO',
            'icon' => 'fa fa-globe', // (optional)

            'inputs' => [
                [
                    'name' => 'seo_title',
                    'type' => 'text',
                    'label' => 'Title',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable|min:2|max:20',
                    'value' => '',
                ],
                [
                    'name' => 'seo_description',
                    'type' => 'text',
                    'label' => 'Description',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable|min:2|max:191',
                    'value' => '',
                ],
                [
                    'name' => 'seo_keywords',
                    'type' => 'text',
                    'label' => 'Keywords',
                    'placeholder' => 'разделить через запятую',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable|min:2|max:191',
                    'value' => '',
                ],
            ]
        ],
        'wallet' => [
            'title' => 'Wallets',
            'icon' => 'fa fa-fa-wallet',
            'inputs' => [
                [
                    'name' => 'wallet:ethereum',
                    'type' => 'text',
                    'label' => 'Ethereum',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('ETHEREUM'),
                ],
                [
                    'name' => 'wallet:bitcoin_p2pkh',
                    'type' => 'text',
                    'label' => 'Bitcoin p2pkh',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('BITCOIN_P2PKH'),
                ],
                [
                    'name' => 'wallet:bitcoin_p2sh',
                    'type' => 'text',
                    'label' => 'Bitcoin p2sh',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('BITCOIN_P2SH'),
                ],
                [
                    'name' => 'wallet:bitcoin_bech32',
                    'type' => 'text',
                    'label' => 'Bitcoin bech32',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('BITCOIN_BECH32'),
                ],
                [
                    'name' => 'wallet:litecoin',
                    'type' => 'text',
                    'label' => 'Litecoin',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('LITECOIN'),
                ],
                [
                    'name' => 'wallet:dogecoin',
                    'type' => 'text',
                    'label' => 'Dogecoin',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('DOGECOIN'),
                ],
                [
                    'name' => 'wallet:bitcoincash',
                    'type' => 'text',
                    'label' => 'Bitcoincash',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('BITCOINCASH'),
                ],
                [
                    'name' => 'wallet:yandex_money',
                    'type' => 'text',
                    'label' => 'Yandex Money',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('YANDEX_MONEY'),
                ],
                [
                    'name' => 'wallet:qiwi',
                    'type' => 'text',
                    'label' => 'Qiwi',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('QIWI'),
                ],
                [
                    'name' => 'wallet:payeer',
                    'type' => 'text',
                    'label' => 'Payeer',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('PAYEER'),
                ],
                [
                    'name' => 'wallet:advcash_usd',
                    'type' => 'text',
                    'label' => 'Advcash USD',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('ADVCASH_USD'),
                ],
                [
                    'name' => 'wallet:advcash_eur',
                    'type' => 'text',
                    'label' => 'Advcash EUR',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('ADVCASH_EUR'),
                ],
                [
                    'name' => 'wallet:advcash_rub',
                    'type' => 'text',
                    'label' => 'Advcash RUB',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('ADVCASH_RUB'),
                ],
                [
                    'name' => 'wallet:advcash_uah',
                    'type' => 'text',
                    'label' => 'Advcash UAH',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('ADVCASH_UAH'),
                ],
                [
                    'name' => 'wallet:perfect_money_usd',
                    'type' => 'text',
                    'label' => 'Perfect Money USD',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('PERFECT_MONEY_USD'),
                ],
                [
                    'name' => 'wallet:perfect_money_eur',
                    'type' => 'text',
                    'label' => 'Perfect Money EUR',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('PERFECT_MONEY_EUR'),
                ],
                [
                    'name' => 'wallet:card_sberbank',
                    'type' => 'text',
                    'label' => 'Card Sberbank',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('CARD_SBERBANK'),
                ], [
                    'name' => 'wallet:card',
                    'type' => 'text',
                    'label' => 'Card',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('CARD'),
                ],
                [
                    'name' => 'wallet:card_space_12',
                    'type' => 'text',
                    'label' => 'Card Space 12',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('CARD_SPACE_12'),
                ],
                [
                    'name' => 'wallet:card_space_16',
                    'type' => 'text',
                    'label' => 'Card Space 16',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'nullable',
                    'value' => env('CARD_SPACE_16'),
                ],
            ]
        ],
    ],

    // Setting page url, will be used for get and post request
    'url' => '/admin/settings',

    // Any middleware you want to run on above route
    'middleware' => ['auth', 'verified'],

    // Route Names
    'route_names' => [
        'index' => 'admin.settings.index',
        'store' => 'admin.settings.store',
    ],

    // View settings
    'setting_page_view' => 'admin.settings.edit',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'card-header',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Сохранить',
    'submit_success_message' => 'Настройки сохранены.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    'controller' => '\App\Http\Controllers\Admin\AppSettingController',

    // settings group
    'setting_group' => 'default'
];
