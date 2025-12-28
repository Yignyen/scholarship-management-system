    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AdminLoginController;

    // for student dashboard
    use App\Http\Controllers\StudentController;

    //scholarship

    use App\Http\Controllers\Student\ScholarshipController;
//for store scholarship form
      use App\Http\Controllers\Student\ApplicationController;

   

    Route::get('/', function () {
        return view('welcome');
    });
    // default /dashboard route is still pointing to the default Laravel dashboard, so when a student logs in, they are seeing the default page
    //Route::get('/dashboard', function () {
      //  return view('dashboard');
    //})->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth'])->get('/dashboard', function () {
        $user = Auth::user();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // send admins to admin dashboard
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard'); // send students to student dashboard
        }
        
        return redirect('/'); // fallback for any other roles (optional)
    })->name('dashboard');
    



    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Admin login
    //Creates a URL: http://127.0.0.1:8000/admin/login, click url and calls showLoginform from admincontroller.
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])
        ->name('admin.login');


    //Handles the form submission from the admin login page
    //ends the request to:AdminLoginController@login()
    Route::post('/admin/login', [AdminLoginController::class, 'login'])
        ->name('admin.login.submit');

    // Admin dashboard (ONLY admin can access)
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        // Scholarships placeholder
        Route::get('/scholarships', function () {
            return view('admin.scholarships.index');
        })->name('admin.scholarships.index');

        // Users placeholder
        Route::get('/users', function () {
            return view('admin.users.index');
        })->name('admin.users.index');

        // Applications placeholder
        Route::get('/applications', function () {
            return view('admin.applications.index');
        })->name('admin.applications.index');
    });

    // Admin Users Route
    // This route handles the "Manage Users" page for admins.
    // - URL: /admin/users
    // - Controller: App\Http\Controllers\Admin\UserController@index
    // - Name: admin.users.index (for Blade route helpers)
    // - Middleware: 'auth' (must be logged in), 'admin' (must be an admin user)
    // - Prefixed with 'admin', so the full URL is /admin/users

      //  Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
      //  Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
    //});


    //for CRUD user management isnide the admin /user managment page

    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

        // Users CRUD
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');

    });
    // for admin schoalrship 
    //This automatically creates:

    //admin.scholarships.create

    //admin.scholarships.store

    //admin.scholarships.index
    Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('scholarships', \App\Http\Controllers\Admin\ScholarshipController::class);

    

            Route::get('/applications', [App\Http\Controllers\Admin\ApplicationController::class, 'index'])
                ->name('applications.index');
        
            Route::post('/applications/{id}/approve', [App\Http\Controllers\Admin\ApplicationController::class, 'approve'])
                ->name('applications.approve');
        
            Route::post('/applications/{id}/reject', [App\Http\Controllers\Admin\ApplicationController::class, 'reject'])
                ->name('applications.reject');
        
        
    });







    // for student scholarship sections(inside studentdashbpard page    )
    // Student routes - only accessible by logged-in students
    //use App\Http\Controllers\Student\ScholarshipController;
    use Illuminate\Support\Facades\Auth;

    Route::middleware(['auth'])
        ->prefix('student')
        ->name('student.')
        ->group(function () {
    
            // Student dashboard
            Route::get('/dashboard', [ScholarshipController::class, 'index'])
                ->name('dashboard');
    
            // Show apply form
            Route::get('/scholarship/{id}/apply', [ScholarshipController::class, 'create'])
                ->name('scholarship.apply.form');
    
            // Store application
            Route::post('/scholarship/{id}/apply', [ScholarshipController::class, 'store'])
                ->name('scholarship.apply.store');
    
            // Edit application (APPLICATION ID)
            Route::get('/applications/{id}/edit', [ScholarshipController::class, 'edit'])
                ->name('applications.edit');
    
            // Update application
            Route::put('/applications/{id}', [ScholarshipController::class, 'update'])
                ->name('applications.update');
        });
    



//Route::post('/scholarship/{scholarship}/apply', [ApplicationController::class, 'store'])
   // ->name('scholarships.store');

    
Route::middleware(['auth', 'student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        Route::post('/scholarship/{scholarship}/apply', 
            [ApplicationController::class, 'store']
        )->name('scholarships.store');

    });

    require __DIR__.'/auth.php';
