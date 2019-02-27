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
 * @property string $role
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

    public const ROLE_USER = 'user';
    public const ROLE_NSI = 'nsi';
    public const ROLE_PROJECTOR = 'projector';
    public const ROLE_VERIFIER = 'verifier';
    public const ROLE_SA = 'sa';

    protected $fillable = [
        'name', 'role', 'post', 'surname', 'first_name', 'patronymic_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rolesList(): array
    {
        return [
            self::ROLE_USER => 'Пользователь',
            self::ROLE_NSI => 'Редактор НСИ',
            self::ROLE_PROJECTOR => 'Проектировщик',
            self::ROLE_VERIFIER => 'Контролер проектов',
            self::ROLE_SA => 'Администратор системы',
        ];
    }

    public function isSA()
    {
        return $this->role === self::ROLE_SA;
    }

    public function isNSI()
    {
        return $this->role === self::ROLE_NSI;
    }

    public function isProjector()
    {
        return $this->role === self::ROLE_PROJECTOR;
    }

    public function isVerifier()
    {
        return $this->role === self::ROLE_VERIFIER;
    }

    public function isUser()
    {
        return $this->role === self::ROLE_USER;
    }

    public function changeRole($role): void
    {
        if (!array_key_exists($role, self::rolesList())) {
            throw new \InvalidArgumentException('Неизвестная роль "' . $role . '"');
        }

        if ($this->role === $role) {
            throw new \DomainException('Эта роль уже назначена');
        }
        $this->update(['role' => $role]);
    }

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
