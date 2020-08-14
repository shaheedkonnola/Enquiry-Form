<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{    
    public function index() {
         return view('admin');
    }
    public function get_enquiries() {
         $enquiries = Contact::orderBy('created_at','desc')->get();  

         return  $enquiries;
    }
    public function find_enquiry($id)
   {
       $enquiry = Contact::where('id',$id)->first();
       
       return $enquiry;
   } 
}
