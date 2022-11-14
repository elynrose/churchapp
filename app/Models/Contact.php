<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const CATEGORY_SELECT = [
        'goyco'  => 'Rev. Nathaniel Goyco',
        'smith'  => 'Rev. Timothy Smith',
        'puma'   => 'Rev. David Puma',
        'clarke' => 'Rev. Joel Clarke',
        'All'    => 'All of the above',
    ];

    public $table = 'contacts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'full_name',
        'church',
        'email',
        'phone',
        'category',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
