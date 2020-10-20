<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $array = [];
    protected $guarded = [];


    public static function crear_modificar($array){
        try{
            $id = [ 'id' =>    $array['userid'] ];
            $data = [
            'id' =>    $array['userid'],
            'user' =>    $array['user'],
            'name' =>    $array['name'],
            'role' =>    $array['role'],
            'email' =>    $array['email'],
            'password' =>    \Hash::make($array['password']),
            ];

            $user = User::updateOrCreate($id, $data);

            return (['message' => 'Exito al grabar el movimiento.' . ' ' . $user['user']] );
        }catch(\Exception $e){
            return (['messageerror' => 'Error al grabar el nuevo movimiento. Consulte con un programador '.$e->getMessage()] );
        }
    }
}
