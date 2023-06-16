<?php

namespace App\Http\Controllers;

use App\Models\Contact;
//use Illuminate\Http\Request;

class ContactController extends Controller
{
    const DEFAULT_CONTACT = ['fullName' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$contact = ['fullName' => '', 'email' => '', 'phone' => '', 'subject' => '', 'message' => ''];
        $input_error = ['fullName' => false, 'email' => false, 'phone' => false, 'subject' => false, 'message' => false];
        $post_error = false;
        $success_post = false;
        return view('contact', ['contact' => $this::DEFAULT_CONTACT, 'inputErrors' => $input_error, 'formSent' => $success_post, 'hasError' => $post_error]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $contact = [];
        $input_error = ['fullName' => false, 'email' => false, 'phone' => false, 'subject' => false, 'message' => false];
        $post_error = false;
        $success_post = false;
        foreach ($this::DEFAULT_CONTACT as $k => $v) {
            $contact[$k] = $_POST[$k];
            if (!$_POST[$k]) {
                $input_error[$k] = true;
                $post_error = true;
            }
        }
        if ($post_error) {
            return view('contact', ['contact' => $contact, 'inputErrors' => $input_error, 'formSent' => $success_post, 'hasError' => $post_error]);
        } else {
            Contact::create($contact);
            $success_post = true;
            return view('contact', ['contact' => $this::DEFAULT_CONTACT, 'inputErrors' => $input_error, 'formSent' => $success_post, 'hasError' => $post_error]);
        }
    }
}
