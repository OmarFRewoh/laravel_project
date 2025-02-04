<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

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

    /**
     * Shows a house or all if no id is provided
     */
    public function getHouse($id): Collection
    {
        return House::findOrFail($id);
    }

    /**
     * Shows a house or all if no id is provided
     */
    public function getHouses($itemsPerPage = 5): LengthAwarePaginator
    {
        return House::orderBy('fecha_anuncio', 'desc')->paginate($itemsPerPage);
    }

    /**
     * Creates or updates a new house
     */
    public function createHouse(array $request): House
    {
        $data = [
            'tipo' => $request['tipo'],
            'zona' => $request['zona'],
            'direccion' => $request['direccion'],
            'ndormitorios' => $request['dormitorios'],
            'precio' => $request['precio'],
            'tamano' => $request['tamano'],
            'extras' => $request['extras'],
            'observaciones' => $request['observaciones']
        ];

        if(!isset($request['id'])) {
            $data['fecha_anuncio'] = now()->format('Y-m-d');
        }

        return $this->updateOrCreate(['id' => $request['id']], $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteHouse(string $id): bool
    {
        return $this->find($id)->delete();
    }
}
