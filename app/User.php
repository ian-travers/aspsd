<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property integer $id
 * @property string $name
 * @property string|null $post
 * @property string|null $surname
 * @property string|null $first_name
 * @property string|null $patronymic_name
 * @property string $email
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property string|null $fio
 * @property string|null $fullName
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'post', 'surname', 'first_name', 'patronymic_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Get FIO
     *
     * @example Иванов А.В.
     * @return string
     */
    public function getFIOAttribute():string
    {
        return (!empty($this->surname) && !empty($this->first_name) && !empty($this->patronymic_name)) ? title_case($this->surname . ' ' . mb_substr($this->first_name, 0, 1) . '. ' . mb_substr($this->patronymic_name, 0, 1) . '.') : '';
    }

    public function getFullNameAttribute()
    {
        return (!empty($this->surname) && !empty($this->first_name) && !empty($this->patronymic_name)) ? title_case($this->surname . ' ' . $this->first_name . ' ' . $this->patronymic_name) : '';
    }

}
