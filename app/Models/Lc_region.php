<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lc_region extends Model
{
    use HasFactory;
    /**
     * Get the child regions for the current region.
     */
    public function childs()
    {
        return $this->hasMany(Lc_region::class, 'parent_id', 'id');
    }
}
