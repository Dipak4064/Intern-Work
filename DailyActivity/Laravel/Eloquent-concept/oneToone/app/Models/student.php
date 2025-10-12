<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Model
{
    use HasFactory;
    // public $fillable = ['name', 'age', 'gender'];
    protected $guarded = [];

    public $timestamps = false;
    
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
    //this is a app/model/Book.php file
    public function student(){
        return $this->belongsTo(Student::class);
    }

}
