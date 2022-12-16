<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_faskes extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the faskes for the Kategori_faskes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faskes()
    {
        return $this->hasMany(Faskes::class, 'kode_kategori', 'id');
    }
}
