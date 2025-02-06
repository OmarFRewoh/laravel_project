<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    CONST DEFAULT_ITEM_PER_PAGE = 10;

    protected $table = 'usuarios';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_usuario',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function getAuthIdentifierName()
    {
        return 'id_usuario';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get a list of all users paginated
     */
    public function getUsers($itemsPerPage = self::DEFAULT_ITEM_PER_PAGE): LengthAwarePaginator
    {
        return User::paginate($itemsPerPage);
    }

    /**
     * Creates or updates a new user
     */
    public function createUser(string $idUsuario)
    {
        return User::create([
            'id_usuario' => $idUsuario,
            'password' => Hash::make(value: Str::password())
        ]);
    }

    /**
     * Deletes a user
     */
    public function deleteUser(string $id): bool
    {
        return $this->where('id_usuario',$id)->delete();
    }
}

