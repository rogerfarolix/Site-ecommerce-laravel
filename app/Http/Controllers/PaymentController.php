<?php
 
namespace App\Http\Controllers;
 
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use NotchPay\NotchPay;
use NotchPay\Payment2;
 
class PaymentController extends Controller
{
    public function __invoke(Product $product): RedirectResponse
    {
        NotchPay::setApiKey('sb.as7oyARzALHkOrdiMIeMmWiuMFF1TkE7f99MsywymEKpEh7A2WZqxwyqT3olWeej3aaHWYOyafn8l9KOKPUFgcBZY2xYzBqXlZLfrx5RNtcqMuQfeQ2JaXt24JtMq');
 
        try {
            $payload = Payment2::initialize([
                'amount' => $product->price,
                'email' => Auth::user()->email,
                'name' => Auth::user()->name,
                'currency' => 'USD',
                'reference' => Auth::id() . '-' . uniqid(),
                'callback' => route('notchpay-callback'),
                'description' => $product->description,
            ]);
 
            return redirect($payload->authorization_url);
        } catch (NotchPay\Exception\ApiException $e) {
            session()->flash('error', __('Impossible de procéder au paiement, veuillez recommencer plus tard. Merci'));
 
            return back();
        }
    }
}