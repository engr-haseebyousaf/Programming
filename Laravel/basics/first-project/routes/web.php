<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Named routes
Route::get("/post",function(){
    return view("one");
})->name("post-page");
Route::get("/news", function(){
    return view("two");
});
// Redirect
Route::redirect("posts", "post");

Route::get("/parameter/{id}", function(string $value){
    return "<h2>". $value ."</h2>";
});

Route::get("/optional-parameter/{id?}", function(string $value = null){
    if ($value){
        return "<h2>" . $value . "</h2>";
    } else{
        return "<h2>No value found </h2>";
    }
});

// Routing Constraints
Route::get("/new/{id}", function(string $id){
    return "<h2> Your id is : " . $id . "</h2>";
})->whereNumber("id");

Route::get("/about/{name}", function(string $nam){
    return "<h2>" . " Your name is : " . $nam . "</h2>";
})->whereAlpha("name");

Route::get("/user/{id}",function(string $uid){
    return "<h2>" . "Your user ID is : " . $uid . "</h2>";
})->whereAlphaNumeric("id");

Route::get("/gallery/{img}", function(string $image){
    return "<h2>" . "Your Image Name is : " . $image . "</h2>";
})->where("img", "[a-zA-Z]+");

Route::get("/category/{type}", function(string $type){
    return "<p>" . "Your choice is : " . $type . "</p>";
})->whereIn("type", ["movie","tiktok"]);


// Group routes
Route::prefix("page")->group(function(){
    Route::get("/one", function(){
        return view("first");
    });
    Route::get("/two", function(){
        return view("second");
    });
    Route::get("/three", function(){
        return view("third");
    });
});

// Fallback function for the route that is not created but called from url or wrongly linked anchor tag
Route::fallback(function(){
    return "<h2>Page Not Found</h2>";
});

Route::get("/blade-template-syntax", function(){
    return view("blade-template");
})->name("bts");

Route::get("/include", function(){
    return view("@include");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
