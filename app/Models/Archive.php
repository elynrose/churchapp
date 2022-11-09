<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archive extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const LANGUAGE_SELECT = [
        'English' => 'English',
        'Spanish' => 'Spanish',
        'French'  => 'French',
    ];

    public $table = 'archives';

    protected $dates = [
        'date_preached',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'location',
        'language',
        'name',
        'date_preached',
        'published',
        'video_url',
        'audio_url',
        'pdf_file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDatePreachedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePreachedAttribute($value)
    {
        $this->attributes['date_preached'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
