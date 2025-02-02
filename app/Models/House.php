<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'viviendas';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'tipo',
        'zona',
        'direccion',
        'ndormitorios',
        'precio',
        'tamano',
        'fecha_anuncio',
        'extras',
        'observaciones'
    ];

    public function getHouses($id = null): Collection
    {
        if ($id) {
            return House::where('id', $id)->get();
        } else {
            return House::all();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createHouse(array $request): Collection
    {
        return $this->updateOrCreate(
            ['id' => $request['id']],[
            'tipo' => $request['tipo'],
            'zona' => $request['zona'],
            'direccion' => $request['direccion'],
            'ndormitorios' => $request['ndormitorios'],
            'precio' => $request['precio'],
            'tamano' => $request['tamano'],
            'fecha_anuncio' => $request['fecha_anuncio'],
            'extras' => $request['extras'],
            'observaciones' => $request['observaciones']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteHouse(string $id): bool
    {
        return $this->find($id)->delete();
    }
}
