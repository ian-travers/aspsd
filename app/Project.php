<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property integer $id
 * @property string $name
 * @property integer $client_id
 * @property string|null $description
 * @property string|null $author_supervisor_name
 * @property Carbon|null $init_info_deadline_at
 * @property Carbon|null $issue_deadline_at
 * @property Carbon|null $expertise_deadline_at
 * @property Carbon|null $init_info_got_at
 * @property Carbon|null $issued_at
 * @property Carbon|null $expertise_passed_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Client $client
 *
 * @property string initInfoDeadline
 * @property string initInfoGot
 * @property string issueDeadline
 * @property string issued
 * @property string expertiseDeadline
 * @property string expertisePassed
 */
class Project extends Model
{
    protected $fillable = [
        'name', 'client_id', 'description', 'author_supervisor_name',
        'init_info_deadline_at', 'issue_deadline_at', 'expertise_deadline_at',
    ];
    protected $dates = [
        'init_info_deadline_at', 'issue_deadline_at', 'expertise_deadline_at', 'init_info_got_at',
        'issued_at', 'expertise_passed_at',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getInitInfoDeadlineAttribute(): string
    {
        return $this->init_info_deadline_at ? $this->init_info_deadline_at->format('d.m.Y') : '';
    }

    public function getInitInfoGotAttribute(): string
    {
        return $this->init_info_got_at ? $this->init_info_got_at->format('d.m.Y') : '';
    }

    public function getIssueDeadlineAttribute(): string
    {
        return $this->issue_deadline_at ? $this->issue_deadline_at->format('d.m.Y') : '';
    }

    public function getIssuedAttribute(): string
    {
        return $this->issued_at ? $this->issued_at->format('d.m.Y') : '';
    }

    public function getExpertiseDeadlineAttribute(): string
    {
        return $this->expertise_deadline_at ? $this->expertise_deadline_at->format('d.m.Y') : '';
    }

    public function getExpertisePassedAttribute(): string
    {
        return $this->expertise_passed_at ? $this->expertise_passed_at->format('d.m.Y') : '';
    }
}
