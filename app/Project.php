<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property integer $id
 * @property string $name
 * @property string|null $description
 * @property string|null $author_supervisor_name
 * @property Carbon $init_info_deadline_at
 * @property Carbon issue_deadline_at
 * @property Carbon state_expertise_deadline_at
 * @property Carbon|null $init_info_got_at
 * @property Carbon|null $issued_at
 * @property Carbon|null $state_expertise_passed_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Project extends Model
{
    //
}
