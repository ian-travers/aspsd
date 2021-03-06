<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectDoc
 *
 * @property integer $id
 * @property string $name
 * @property integer $project_id
 * @property string|null $organization
 * @property string|null $signer_name
 * @property Carbon|null $doc_date
 *
 * @property Project $project
 *
 * @property string $date
 *
 */
class ProjectDoc extends Model
{
    public $timestamps = false;

    protected $dates = [
        'doc_date',
    ];

    protected $guarded = [
        'id',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getDateAttribute(): string
    {
        return $this->doc_date ? $this->doc_date->format('d.m.Y') : '';
    }
}
