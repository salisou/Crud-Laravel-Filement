<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * I campi che possono essere assegnati in massa (mass assignment).
     * In questo caso permettiamo di salvare solo il campo "name".
     *
     * Esempio:
     * Category::create(['name' => 'Business']);
     */
    protected $fillable = ['name'];

    public function ideas()
    {
        /**
         * Relazione One-to-Many:
         * Una categoria può avere molte idee.
         *
         * hasMany() dice a Laravel:
         * - cerca nella tabella "ideas"
         * - la colonna "category_id"
         * - e collegala a questa categoria
         *
         * Esempio:
         * $category->ideas → restituisce tutte le idee collegate
         */
        return $this->hasMany(Idea::class);
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
