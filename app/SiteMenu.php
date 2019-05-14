<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteMenu extends Model
{
    public  function sub_menu()
    {
        return $this->hasOne(SiteMenu::class, 'parent_id', 'id');
    }

    public  function submenu()
    {
        return $this->hasMany(SiteMenu::class, 'parent_id', 'id');
    }
}
