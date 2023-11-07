<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "slug" => "/",
                "name" => "home",
                "seo_title" => "Help us fight for your privacy!",
                "seo_description" => "Free secure online notepad on the web. This notepad with password makes it easy to store notes online without having to login. ProtectedText is a free, simple and secure web notepad without ads.",
            ],
            [
                "slug" => "/site/helpusfight",
                "name" => "helpusfight",
                "seo_title" => "Help us fight for your privacy!",
                "seo_description" => "The safest way to store your text online. Free online encrypted notepad. Simple. No Registration. No ads. Access any subsite, you find it - it's yours.",
            ],
            [
                "slug" => "/faq",
                "name" => "faq",
                "seo_title" => "FAQ",
                "seo_description" => "",
            ],
            [
                "slug" => "/about",
                "name" => "about",
                "seo_title" => "About as",
                "seo_description" => "",
            ],
            [
                "slug" => "/privacy",
                "name" => "privacy",
                "seo_title" => "Privacy",
                "seo_description" => "",
            ],
            [
                "slug" => "/support",
                "name" => "privacy",
                "seo_title" => "Privacy",
                "seo_description" => "",
            ]
        ];
        foreach ($data as $page){
            if (Page::whereName($page['name'])->doesntExist()){
                Page::create($page);
            }
        }
    }
}
