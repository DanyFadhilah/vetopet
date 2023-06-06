use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [RegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
Route::post('/admin', [RegisterController::class, 'register'])->name('admin.register');
Route::get('/customer', [RegisterController::class, 'showCustomerRegistrationForm'])->name('register.customer');
Route::post('/customer', [RegisterController::class, 'register'])->name('customer.register');