<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }
    
    public function contact()
    {
        return view('guest.contact');
    }

    public function handleContactForm(Request $request)
    {
       // salviamo a db i dati inseriti nel form di contatto
       $form_data = $request->all();
       //dd($form_data);

       $new_lead = new Lead();
       $new_lead->fill($form_data);
       $new_lead->save();

       //inviamo la mail all'admin del sito, passando il nuovo oggetto Lead
        Mail::to('info@boolpress.com')->send(new SendNewmail($new_lead));        

       return redirect()->route('contact.thank-you');

    }

    public function thankYou() {
        return view('guest.thank-you');
    }
}
