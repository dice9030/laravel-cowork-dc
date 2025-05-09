<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Reservation extends Model
{
    use HasFactory,CrudTrait;
    protected $fillable = ['user_id', 'space_id', 'start_time', 'end_time', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function space()
    {
        return $this->belongsTo(Space::class);
    }
    public function exportExcelButton()
    {
        return '<a class="btn btn-primary" href="' . url('admin/reservation/export') . '">
                    <i class="la la-download"></i> Exportar Excel
                </a>';
    }
}
