<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $table = 'about_page';

    protected $fillable = [
        'title',
        'subtitle',
        'main_content',
        'hero_image',
        'team_1_name', 'team_1_role', 'team_1_image',
        'team_2_name', 'team_2_role', 'team_2_image',
        'team_3_name', 'team_3_role', 'team_3_image',
    ];
}
