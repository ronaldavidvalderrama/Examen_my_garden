<?php

declare(strict_types=1);

namespace App\Domain\Model\Plantas;

use Illuminate\Database\Eloquent\Model;

class Plantas extends Model
{
    protected $table = 'plantas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nombre', 'categoria', 'familia', 'proximo_riego'];
}
