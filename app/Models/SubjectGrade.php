<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectGrade extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the SubjectGrade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subjectmaterial that owns the SubjectGrade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subjectmaterial(): BelongsTo
    {
        return $this->belongsTo(SubjectMaterial::class);
    }

    /**
     * Get the student that owns the SubjectGrade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the subject that owns the SubjectGrade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

}
