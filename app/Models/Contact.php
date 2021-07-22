<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name'];

    /**
     * Has many relation for contact numbers
     *
     * @return HasMany
     */
    public function numbers() : HasMany
    {
        return $this->hasMany(ContactNumber::class);
    }

}
