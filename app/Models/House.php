<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class House extends Model
{
    CONST DEFAULT_ITEM_PER_PAGE = 5;

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

    public function photos()
    {
        return $this->hasMany(Photo::class, 'id_vivienda');
    }

    /**
     * Shows a house
     */
    public function getHouse($id): Collection
    {
        return House::findOrFail($id);
    }

    /**
     * Gets a list of all houses with photos, orderred by desc date and paginated
     */
    public function getHouses($itemsPerPage = self::DEFAULT_ITEM_PER_PAGE): LengthAwarePaginator
    {
        return House::with('photos')->orderBy('fecha_anuncio', 'desc')->paginate($itemsPerPage);
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
     * Deletes a house
     */
    public function deleteHouse(string $id): bool
    {
        return $this->find($id)->delete();
    }

    /**
     * Search for houses which adjust to the filters
     */
    public function searchHouse(array $filters): LengthAwarePaginator 
    {
        $dormitoriosMap = [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5 o más'
        ];

        $housesQuery = $this::with('photos');

        $housesQuery->when(isset($filters['tipo']), function ($query) use ($filters) {
            $query->where('tipo', $filters['tipo']);
        });

        $housesQuery->when(isset($filters['zona']), function ($query) use ($filters) {
            $query->where('zona', $filters['zona']);
        });
    
        $housesQuery->when(isset($filters['precio']), function ($query) use ($filters) {
            $query->where('precio', $filters['precio-operator'], $filters['precio']);
        });
    
        $housesQuery->when(isset($filters['dormitorios']), function ($query) use ($filters, $dormitoriosMap) {
            $dormitorios = $filters['dormitorios'];
            $operator = $filters['dormitorios-operator'];

            if ($dormitorios == '5') {
                $query->where('ndormitorios', '5 o más');
            } else {
                if ($operator == '<=') {
                    $query->whereIn('ndormitorios', array_slice($dormitoriosMap, 0, $dormitorios));
                } elseif ($operator == '>=') {
                    $query->whereIn('ndormitorios', array_slice($dormitoriosMap, $dormitorios - 1));
                } else {
                    $query->where('ndormitorios', $dormitoriosMap[$dormitorios]);
                }
            }
            
            $query->where('ndormitorios', $filters['dormitorios-operator'], $filters['dormitorios']);
        });
    
        $housesQuery->when(isset($filters['tamano']), function ($query) use ($filters) {
            $query->where('tamano', $filters['tamano-operator'], $filters['tamano']);
        });

        return $housesQuery->orderBy('fecha_anuncio', 'desc')->paginate(self::DEFAULT_ITEM_PER_PAGE);

    }
}
