<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Client extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug(trim($this->name));
    }
}
