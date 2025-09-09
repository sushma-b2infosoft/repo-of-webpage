<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

// class User extends Model
// {
//     use SoftDeletes;

//     // Mass assignment ke liye safe fields
//     protected $fillable = [
//         'name', 'email', 'password',
//          'active'
//         ];
//         public function profile()
//     {
//         return $this->hasOne(Profile::class);
//     }
// }

// //class User extends Authenticatable
// {
//     /** @use HasFactory<\Database\Factories\UserFactory> */
//     use HasFactory, Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var list<string>
//      */
//     protected $fillable = [
//         'name',
//         'email',
//         'password',
//     ];

//     /**
//      * The attributes that should be hidden for serialization.
//      *
//      * @var list<string>
//      */
//     protected $hidden = [
//         'password',
//         'remember_token',
//     ];

//     /**
//      * Get the attributes that should be cast.
//      *
//      * @return array<string, string>
//      */
//     protected function casts(): array
//     {
//         return [
//             'email_verified_at' => 'datetime',
//             'password' => 'hashed',
//         ];
//     }
// }
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ correct namespace
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // ✅ correct usage

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Relationship with Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function country()
{
    return $this->belongsTo(Country::class);
}

public function posts()
{
    return $this->hasMany(Post::class);
}

}


