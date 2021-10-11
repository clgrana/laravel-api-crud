<?php


namespace App\Models;


use App\Utils\Format;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @var string $table */
    public $table = 'city';

    /** @var string $primaryKey */
    public $primaryKey = 'id';

    protected $fillable = ['city', 'uf_id'];

    public function Uf()
    {
        return $this->belongsTo(Uf::class, 'uf_id', 'id');
    }

    /**
     * @param $city
     * @param $uf
     * @return mixed
     * create a city if not exists
     */
    public static function NewCity($city, $uf)
    {
        $uf = Uf::where('uf', $uf)->first();
        $city = City::firstOrCreate(
            ['city' => Format::formatString($city)],
            ['uf_id' => $uf->id]
        );
        return $city;
    }
}
