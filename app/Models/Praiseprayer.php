<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Praiseprayer extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const SELECT_TYPE_SELECT = [
        'Prayer Request'                    => 'Prayer Request',
        'Note of Praise'                    => 'Note of Praise',
        'Prayer Request and Note of Praise' => 'Prayer Request and Note of Praise',
    ];

    public $table = 'praiseprayers';

    protected $dates = [
        'date_submitted',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'select_type',
        'full_name',
        'on_behalf_of',
        'details',
        'date_submitted',
        'closed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDateSubmittedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSubmittedAttribute($value)
    {
        $this->attributes['date_submitted'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
