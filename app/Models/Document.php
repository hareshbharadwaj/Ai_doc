<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'template_type', 'title', 'form_data', 'content', 'pdf_path', 'pdf_size', 'doc_number', 'user_email',
    ];

    protected $casts = [
        'form_data' => 'array',
    ];
}
