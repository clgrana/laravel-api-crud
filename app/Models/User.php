<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /** @var string $table */
    public $table = 'users';

    /** @var string $primaryKey */
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [];
    public function Address()
    {
        return $this->hasOne(Address::class, 'user_id', $this->primaryKey);
    }

    /**
     * @param $request
     * @return bool
     */
    public function CreateUser($request)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user = $user->create(['name' => $request['name'], 'email' => $request['email']]);
            $city = City::NewCity($request['city'], $request['uf']);
            Address::NewAddress($user->id, $request['address'], $city);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            return false;
        }
    }

    /**
     * @param $id
     * @param $request
     * @return bool
     */
    public function UpdateUser($id, $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user = $user->update($request->only(['name', 'email']));
            $city = City::NewCity($request->input('city'), $request->input('uf'));
            Address::UpdateAddress($user->id, $request['address'], $city->id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
//            report($e);
            return false;
        }
    }
}
