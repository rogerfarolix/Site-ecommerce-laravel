<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use NotchPay\NotchPay;
use NotchPay\Payment2;
 
class NotchPayCallBackController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        // @ToDO Mis a jour de la commande dans votre base de données
        NotchPay::setApiKey('sb.as7oyARzALHkOrdiMIeMmWiuMFF1TkE7f99MsywymEKpEh7A2WZqxwyqT3olWeej3aaHWYOyafn8l9KOKPUFgcBZY2xYzBqXlZLfrx5RNtcqMuQfeQ2JaXt24JtMq');
        $verifyTransaction = Payment2::verify($request->get('reference'));
 
 
        if ($verifyTransaction->transaction->status === 'canceled') {
            session()->flash('error', __('Votre achat a été annulé veuillez relancer si vous souhaitez payer votre produit, Merci.'));
        } else {
            // @ToDO Envoie de mail de remerciement pour l'achat' de l'utilisateur qui est dans la base de données
 
            session()->flash('status', __('Votre achat a été effectué avec succès, Merci pour votre confiance.'));
        }
 
 
        return back();
    }
}