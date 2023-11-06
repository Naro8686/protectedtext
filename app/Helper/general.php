<?php

use App\Models\Page;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Foundation\Application;

function pageUrlWhereName($name): Application|string|UrlGenerator|\Illuminate\Contracts\Foundation\Application
{
    $pages = Page::fromCache();
    $slug = $pages->where('name', $name)->first()?->slug ?? '/';
    return url($slug);
}
