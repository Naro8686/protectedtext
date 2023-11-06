<?php

namespace App\Enums;

class Bip
{
    /**
     * @return array
     */
    public static function all(): array
    {
        return [
            1 => [
                'from_2' => '>1',
                'from_2_to_5' => '2-5',
                'from_5_to_12' => '5-12',
                12 => '12',
                15 => '15',
                18 => '18',
                21 => '21',
                24 => '24'
            ],
            2 => [
                'from_2' => '>1',
                'from_2_to_5' => '2-5',
                'from_5_to_12' => '5-12',
                12 => 12
            ],
            3 => [
                'from_2' => '>1',
                13 => '13',
                25 => '25'
            ]
        ];
    }

    /**
     * @return array
     */
    public static function fields(): array
    {
        return [
            1 => [
                'checked' => 'bip_1_checked',
                'has' => 'has_bip_1',
                'count' => 'bip_1_count',
                'text' => 'bip_1_text'
            ],
            2 => [
                'checked' => 'bip_2_checked',
                'has' => 'has_bip_2',
                'count' => 'bip_2_count',
                'text' => 'bip_2_text'
            ],
            3 => [
                'checked' => 'bip_3_checked',
                'has' => 'has_bip_3',
                'count' => 'bip_3_count',
                'text' => 'bip_3_text'
            ],
        ];
    }

    /**
     * @return array
     */
    public static function counts(): array
    {
        return [
            1 => [12, 15, 18, 21, 24],
            2 => [12],
            3 => [13, 25]
        ];

    }
}
