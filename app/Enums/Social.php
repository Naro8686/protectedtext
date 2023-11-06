<?php

namespace App\Enums;

class Social
{
    public static function links()
    {
        $socialLinks = [
            'facebook' => 'https://facebook.com/sharer.php?'. http_build_query(['u' => config('app.url')]),
            'twitter' => 'https://twitter.com/intent/tweet?'. http_build_query(['url' => config('app.url')]),
            'linkedin' => 'https://www.linkedin.com/shareArticle?'. http_build_query(['url' => config('app.url')]),
            'whatsapp' => 'whatsapp://send?'. http_build_query(['text' => config('app.url')]),
            'telegram' => 'https://telegram.me/share/url?'. http_build_query(['url' => config('app.url')]),
            'reddit' => 'https://www.reddit.com/submit?'. http_build_query(['url' => config('app.url')]),
        ];

        return $socialLinks;
    }

}
