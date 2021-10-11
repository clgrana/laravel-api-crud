<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    /** @var string $table */
    public $table = 'address';

    /** @var string $primaryKey */
    public $primaryKey = 'id';

    protected $fillable = ['user_id', 'address', 'city_id', 'uf_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function Uf()
    {
        return $this->belongsTo(Uf::class, 'uf_id', 'id');
    }

    /**
     * @param $userId
     * @param $address
     * @param $city
     * @return mixed
     * Create address
     */
    public static function NewAddress($userId, $address, $city)
    {
        $address = (new Address)->fill(['user_id' => $userId, 'address' => $address, 'city_id' => $city->id, 'uf_id' => $city->uf_id]);
        $address->save();
        return $address;
    }

    /**
     * @param $userId
     * @param $address
     * @param $cityId
     * @return mixed
     * Update address
     */
    public static function UpdateAddress($userId, $address, $cityId)
    {
        $address = Address::where('user_id', $userId)->update(['address' => $address, 'city_id' => $cityId]);
        return $address;
    }

    /**
     * @return mixed
     * Users by City
     */
    public function byCity()
    {
        return Address::select('city_id', 'city.city', DB::raw('count(*) as total'))->join('city', 'city_id', 'city.id')->groupBy('city_id', 'city.city')->get();
    }

    /**
     * @return mixed
     * Users by Uf
     */
    public function byUf()
    {
        return Address::select('uf_id', 'uf.uf', DB::raw('count(*) as total'))->join('uf', 'uf_id', 'uf.id')->groupBy('uf_id', 'uf.uf')->get();
    }
}
