<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    /** @var string $table */
    public $table = 'uf';

    /** @var string $primaryKey */
    public $primaryKey = 'id';

    protected $fillable = ['uf'];

    public function City()
    {
        return $this->hasMany(City::class, 'uf_id', $this->primaryKey);
    }
}
