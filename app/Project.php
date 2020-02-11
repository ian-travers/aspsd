<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Kyslik\ColumnSortable\Sortable;

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
 * @property string $initInfoDeadline
 * @property string $initInfoGot
 * @property string $issueDeadline
 * @property string $issued
 * @property string $expertiseDeadline
 * @property string $expertisePassed
 * @property string $initInfoCellCSS
 * @property string $issueCellCSS
 * @property string $expertiseCellCSS
 */
class Project extends Model
{
    use Sortable;

    const CSS_EXPIRED_DATE = 'bg-primary';
    const CSS_CLOSELY_DATE = 'bg-warning';
    const CSS_TODAY_DATE = 'bg-danger';

    protected $fillable = [
        'name', 'client_id', 'description', 'author_supervisor_name',
        'init_info_deadline_at', 'issue_deadline_at', 'expertise_deadline_at',
        'init_info_got_at', 'issued_at', 'expertise_passed_at',
    ];
    protected $dates = [
        'init_info_deadline_at', 'issue_deadline_at', 'expertise_deadline_at', 'init_info_got_at',
        'issued_at', 'expertise_passed_at',
    ];

    public function projectDocs()
    {
        return $this->hasMany(ProjectDoc::class);
    }

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
//        Carbon::setLocale('ru');
        return $this->init_info_got_at ? $this->init_info_got_at->format('d.m.Y') : '';
//        return $this->init_info_got_at ? $this->init_info_got_at->format('d.m.Y') : ($this->init_info_deadline_at ? $this->init_info_deadline_at->diffForHumans() : '');
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

    public function getInitInfoCellCSSAttribute()
    {
        return $this->setDateCellCSSClass($this->init_info_deadline_at, $this->init_info_got_at);
    }

    public function getIssueCellCSSAttribute()
    {
        return $this->setDateCellCSSClass($this->issue_deadline_at, $this->issued_at);
    }

    public function getExpertiseCellCSSAttribute()
    {
        return $this->setDateCellCSSClass($this->expertise_deadline_at, $this->expertise_passed_at);
    }

    private function setDateCellCSSClass(?Carbon $beginDate, $endDate): string
    {
        if ($beginDate) {
            $diffDays = $beginDate->diffInDays($endDate ?: now(), false);

            if (isset($endDate)) {
                return $diffDays > 0 ? self::CSS_EXPIRED_DATE : '';
            }

            if ($diffDays > 0) {
                return self::CSS_EXPIRED_DATE;
            }
            if ($diffDays === 0) {
                $diffHours = $beginDate->diffInHours($endDate ?: now(), false);
                return $diffHours > 0 ? self::CSS_TODAY_DATE : self::CSS_CLOSELY_DATE;
            }
            if ($diffDays >= -14 && $diffDays < 0) {
                return self::CSS_CLOSELY_DATE;
            }
        }

        return '';
    }

    public function isExpertiseNeeds()
    {
        return isset($this->expertise_deadline_at);
    }

    // check confirmation for the dates
    public function isInitInfoGot(): bool
    {
        return isset($this->init_info_got_at);
    }

    public function isIssued(): bool
    {
        return isset($this->issued_at);
    }

    public function isExpertisePassed(): bool
    {
        return isset($this->expertise_passed_at);
    }

    // confirm the dates
    public function confirmDate(string $field, Carbon $date = null)
    {
        if (isset($date)) {
            $this->{$field} = $date;
        }
    }

    // check for delete ability
    public function isDeletable()
    {
        return !(isset($this->init_info_got_at) || isset($this->issued_at) || isset($this->expertise_passed_at));
    }

    public function scopeFilter(Builder $query, $filter)
    {
        if (isset($filter['term']) && $term = $filter['term']) {
            $query->where(function ($q) use ($term) {
                $q->orWhere('name', 'like', "%{$term}%");
                $q->orWhere('description', 'like', "%{$term}%");
            });
        }
    }

    public function scopeYear(Builder $query, $filter)
    {
        if (isset($filter['year']) && $year = $filter['year']) {


            $query->where(function ($q) use ($year) {
                $q->orWhereYear('created_at', '=', "{$year}");
            });
        }
    }

    public static function getProjectsYears(): array
    {
        return Cache::remember('years', 1440, function () {
            $result = Project::select(\DB::raw('YEAR(created_at) as year'))
            ->distinct()
            ->orderBy('year', 'DESC')
            ->get();

            return array_filter($result->pluck('year')->toArray());
        });
    }
}
