<?php

use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index')->middleware('customer');
Route::post('/pin',[PagesController::class,'index2'])->name('pin');

// Demo routes
Route::middleware(['phone_verify'])->group(function(){

    Route::get("/change-profile-data",[PagesController::class,'chnageProfile']);
    Route::post("/change-profile-data",[PagesController::class,'chnageProfileSubmit']);

    Route::get("/delete-account",[PagesController::class,'deleteAccount']);

    Route::get('/datatables', 'PagesController@datatables');
    Route::get('/ktdatatables', 'PagesController@ktDatatables');
    Route::get('/select2', 'PagesController@select2');
    Route::get('/jquerymask', 'PagesController@jQueryMask');
    Route::get('/icons/custom-icons', 'PagesController@customIcons');
    Route::get('/icons/flaticon', 'PagesController@flaticon');
    Route::get('/icons/fontawesome', 'PagesController@fontawesome');
    Route::get('/icons/lineawesome', 'PagesController@lineawesome');
    Route::get('/icons/socicons', 'PagesController@socicons');
    Route::get('/icons/svg', 'PagesController@svg');
    
    Route::get("/password-reset",[PagesController::class,'passwordRreset']);
    Route::post("/password-reset",[PagesController::class,'passwordRresetSubmit']);


    Route::get('/enable-2fa',[PagesController::class,'enable2Fa']);
    Route::post('/enable-2fa',[PagesController::class,'enable2FaSubmit']);
    
    
    
    // Quick search dummy route to display html elements in search dropdown (header search)
    Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

    Route::get("/change-profile",[PagesController::class,'changeProfile']);
    Route::post("/change-profile",[PagesController::class,'changeProfileSubmit']);

     
});

Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get("/signup",function(){
    return view('auth.signup');
})->name('signup');

Route::get('/auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/auth/github', 'Auth\GithubController@redirectToGoogle');
Route::get('/auth/github/callback', 'Auth\GithubController@handleGoogleCallback');

Route::get("/payment",function(){
    if(Auth::user()->payment_method){
        return redirect('/top-up');
    }
    $id = Auth::user()->stripe_id;
    $user = Cashier::findBillable($id);
    
    if(!$user){
        $options = [
            'description' => "New Stripe Customer",
            'email' => Auth::user()->email,
            // 'name' => Auth::user()->name
        ];
        $user = Auth::user();
        $stripeCustomer = $user->createAsStripeCustomer($options);
        // $stripeCustomer = $user->createOrGetStripeCustomer();
    }

    // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    // $intent = \Stripe\PaymentIntent::create([
    //     'amount' => 300,
    //     'currency' => 'usd',
    //     // Verify your integration in this guide by including this parameter
    //     'metadata' => ['integration_check' => 'accept_a_payment'],
    //   ]);
    // return view('pages.payment',);
    // $user = $user->createOrGetStripeCustomer(Auth::user()->stripe_id);
    // $user = $user->createOrGetStripeCustomer(Auth::user()->stripe_id);
    // $stripeCustomer = $user->asStripeCustomer();
        return view('pages.payment', [
        'intent' => $user->createSetupIntent()
    ]);
    
});

Route::post('/payment',function(){
    $a = request()->input('d');
    // $a = json_encode($a);
    // return request()->result;
    $user = Auth::user();
    $user->payment_method = $a;
    $user->save();
    // return $stripeCustomer = $user->createOrGetStripeCustomer();
    // $stripeCustomer = $user->asStripeCustomer();
    // $stripeCustomer = $user->asStripeCustomer();
    // $user->addPaymentMethod($a);
    $user->updateDefaultPaymentMethod($a);
    $user->updateDefaultPaymentMethodFromStripe();
    // $stripeCustomer->updateDefaultPaymentMethod($a);
    // return json_encode(array('data'=>request()->result['paymentIntent']['id']));
    return "hi";
});


Route::get('/top-up',function(){
    if(!Auth::user()->payment_method){
        return redirect("/payment")->with("error",'First add payment method first');
    }
    return view('pages.topup');
});

Route::post("/pay",function(Request $request){
    $request->validate([
        'amount' => 'required|digits_between:2,4|numeric'
    ]);
    $user = Auth::user();
    $amount = $request->amount;
    $priceInWallet = number_format($amount/100, 2, '.', ' ');
    // return $paymentMethod = $user->defaultPaymentMethod();
    // $paymentMethod = $user->paymentMethods();;
    // $stripe = new \Stripe\StripeClient(
    //     'sk_test_tUo0u4qvLS16TxxG2p80T1iY00tIrGkLUv'
    //   );
    // $v = $stripe->paymentMethods->retrieve(
    //     'pm_1IaEdBHTRvqxtWQjK4lDMTaD',
    //   );
    $v = $user->payment_method;
    // return auth () -> user () -> paymentMethods ();
    if($stripeCharge = auth()->user()->charge(
        $amount, $v
    )){ 
        $user->depositFloat($priceInWallet);
        return redirect("/")->with("success","Amount added to account successfully");
    }else{
        return redirect("/")->with("error","Cannot charged at the moment");
    }
});



// Route::get("/s",function(){
//     $user = Auth::user();
//     echo  $user->balanceFloat; // int(0)
//     $user->depositFloat(10.5);
//     // $user->balanceFloat;
//     // var_dump($user->balance); 
//     // echo $user->balance; // int(10)
//     // $user->withdraw(1);
//     // echo $user->balance; // int(9)
// });




// Route::get('/', 'PlayerController@index')->name('customer')->middleware('customer');
// Route::get('/seller', 'ScoutController@index')->name('seller')->middleware('seller');