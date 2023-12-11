<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialComplete extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the subjectmaterial that owns the MaterialComplete
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subjectmaterial(): BelongsTo
    {
        return $this->belongsTo(SubjectMaterial::class);
    }
}
