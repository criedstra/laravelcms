<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = new Content;
        $content->user_id   = 2;
        $content->title         = "Pagina 1";
        $content->body          = "pagina 1 body";
        $content->template      = "default";
        $content->friendlyurl   = "pagina1";
        $content->status        = "1";
        $content->save();

        $content = new Content;
        $content->user_id   = 2;
        $content->title         = "Pagina 2";
        $content->body          = "pagina 2 body";
        $content->template      = "default";
        $content->friendlyurl   = "pagina2";
        $content->status        = "0";
        $content->save();
    }
}
