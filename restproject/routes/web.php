<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;

use Illuminate\Support\Facades\Hash;
// Route::get('/register', [AuthController::class, 'showForm'])->name('register.form');
// Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
// Route::get('/register', [AuthController::class, 'showForm'])->name('register.form');
// Route::post('/register', [AuthController::class, 'register'])->name('register.submit');



// Default welcome route
// Route::get('/', function () {
//     return view('welcome');
// });

// //Admin group with prefix /admin
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return "Welcome to Admin Dashboard";
//     });
// });

// // Restricted route with middleware applied
// Route::get('/restricted', function (\Illuminate\Http\Request $request) {
//     return "You are allowed to access this page! Age: " . $request->age;
// })->middleware('checkAge');




// Restricted route with age check middleware
// Route::get('/', function () {
//     return "You are allowed to access this page!";
// })->middleware('checkAge');
// Route::get('/links', function () {
//     return view('link');
// });

// // About page
// Route::get('/about', function () {
//     return "This is the About Page!";
// })->name('about');

// // Handle form submit
// Route::post('/submit', function (\Illuminate\Http\Request $request) {
//     return "Form submitted! Name: " . $request->input('name');
// });
// Route::get('/register', function () {
//     return view('register');
// })->name('register.form');

// // Handle form submit
// Route::post('/register', function (\Illuminate\Http\Request $request) {
//     // For now, just dump the submitted data
//     return dd($request->all());
// })->name('register.submit');

// use App\Models\User;

// Route::get('/test-crud', function () {
//     // 1️⃣ Create
//     $user = User::create([
//         'name' => 'Renu',
//         'email' => 'renu@test.com',
//         'password' => bcrypt('123456'),
//     ]);

//     // 2️⃣ Read
//     $allUsers = User::all();

//     // 3️⃣ Update
//     $user->update([
//         'name' => 'Renu Updated'
//     ]);

//     // 4️⃣ Delete
//     // $user->delete();

//     dd([
//         'created_user' => $user,
//         'all_users' => $allUsers,
//     ]);
// });
// use App\Models\User;

// Route::get('/soft-delete-demo', function () {
//     // 1. Soft delete
//     $user = User::find(1);
//     $user->delete();

//     // 2. Normal get (deleted user not included)
//     $activeUsers = User::all();

//     // 3. With trashed (includes deleted)
//     $allUsers = User::withTrashed()->get();

//     // 4. Only trashed (just deleted users)
//     $trashedUsers = User::onlyTrashed()->get();

//     // 5. Restore user
//     if ($user->trashed()) {
//         $user->restore();
//     }

//     return dd([
//         'active_users' => $activeUsers,
//         'all_users' => $allUsers,
//         'trashed_users' => $trashedUsers,
//         'restored_user' => $user,
//     ]);
// });
use App\Http\Controllers\UserController;

// Route::get('/create-user', [UserController::class, 'testEloquent']);
//Route::get('/all-users', [UserController::class, 'showAllUsers']);
//Route::get('/active-names', [UserController::class, 'activeNames']);
// Route::get('/update-user', [UserController::class, 'updateUser']);
// Route::get('/delete-user', [UserController::class, 'deleteUser']);
// Route::get('/trashed-users', [UserController::class, 'trashedUsers']);
// Route::get('/restore-user', [UserController::class, 'restoreUser']);
// Route::get('/test-eloquent', [UserController::class, 'testEloquent']);
// Route::get('/', function () {
//     // CREATE
//     $user = User::create([
//         'name' => 'Varun',
//         'email' => 'varun@test.com',
//         'password' => Hash::make('123456'),
//         'active' => 1,
//     ]);
//     dd($user); // naye user ka pura data

//     // READ - all
//     $allUsers = User::all();
//     dd($allUsers);

//     // READ - find by id
//     $singleUser = User::find(1);
//     dd($singleUser);

//     // UPDATE
//     $user = User::find(1);
//     $user->update(['name' => 'Varun Updated']);
//     dd($user);

//     // DELETE (Soft delete)
//     $user->delete();
//     dd('User soft deleted');
// });
// Route::get('/test-query', function () {
//     $users = User::where('active', 1)   // condition
//                  ->orderBy('name')      // sorting
//                  ->pluck('name');       // sirf names array

//     dd($users);
// });

// routes/web.php
//use App\Http\Controllers\UserController;

//Route::get('/user/{id}', [UserController::class, 'show']);


// use App\Models\User;

// Route::get('/create-user', function () {
//     $user = User::create([
//         'name' => 'Renu',
//         'email' => 'renu'.time().'@example.com', // unique email
//         'password' => bcrypt('secret')
//     ]);

//     $user->profile()->create([
//         'phone' => '1234567890',
//         'address' => 'Jaipur'
//     ]);

//     return $user->load('profile');
// });
// Route::get('/users', function () {
//     $users = User::with('profile')->get();

//     foreach ($users as $user) {
//         echo "Name: {$user->name}, Phone: {$user->profile->phone}, Address: {$user->profile->address} <br>";
//     }
// });
// use App\Models\Post;
// Route::get('/create-post', function () {
//     $post = Post::create([
//         'title' => 'First Post',
//         'body' => 'This is my first blog post!'
//     ]);

//     $post->comments()->create([
//         'author' => 'Renu',
//         'content' => 'Great post!'
//     ]);

//     $post->comments()->create([
//         'author' => 'Sita',
//         'content' => 'Thanks for sharing!'
//     ]);

//     return $post->load('comments'); // post ke sath comments bhi dikhayega
// });
Route::get('/test', function () {
    $user = User::find(1);

    if ($user && $user->profile) {
        echo $user->profile->bio;
    } else {
        echo "User ya Profile nahi mila!";
    }
});

use App\Models\Comment;

Route::get('/test-poly', function () {
    // ek post create
    $post = Post::create([
        'title' => 'My First Post',
        'body' => 'This is the body of the post',
    ]);

    // ek video create
    $video = Video::create([
        'title' => 'My First Video',
        'url' => 'http://example.com/video.mp4',
    ]);

    // post pe comment
    $post->comments()->create(['body' => 'Good post!']);

    // video pe comment
    $video->comments()->create(['body' => 'Nice video!']);

    // comment ka parent check
    $comment = Comment::first();
    return $comment->commentable; // ye Post ya Video return karega
});

// returns Post or Video

// $user = User::find(1);
// echo $user->profile->bio;

// // Save related record
// $user->profile()->create([
//     'bio' => 'This is my bio'
// ]);



// // Example 2: One To Many (Post → Comments)
// $post = Post::find(1);

// // Access
// $allComments = $post->comments;

// // Save
// $post->comments()->create([
//     'user_id' => 1,
//     'body' => 'Nice post!'
// ]);





// Route::get('/many-to-many', function () {
//     $student = \App\Models\Student::firstOrCreate([
//         'email' => 'renu@example.com',
//     ], [
//         'name' => 'Renu',
//     ]);

//     $course = \App\Models\Course::firstOrCreate([
//         'title' => 'PHP Basics',
//     ]);

//     // Attach course to student
//     $student->courses()->attach($course->id);

//     return $student->load('courses');
// });