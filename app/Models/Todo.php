<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = "todo";

    // kolom tabel yang bisa diisi
    protected $fillable = ["task","is_done","id_user"];
}
