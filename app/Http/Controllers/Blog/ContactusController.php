<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Http\Request;
use Mail;


class ContactusController extends BlogController
{
    /**
     * Show all articles
     * @param App\Article $article -> The details about the article
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('blog.contact_us');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $contact = $request->phone;
        $email = $request->email;
        $note = $request->message;

        if(!empty($request->email))
        {
            $title = 'Website Inquiry';
            $emails = 'projects.aakar@gmail.com';

            Mail::send('emails.contactus', ['name' => $name , 'contact' => $contact , 'email' => $email , 'note' => $note] , function($message) use($title,$emails){
            $message->to($emails)
                    ->subject($title);
            $message->from('dweekstudios@gmail.com','Virtu Expo');
            });
        }

        return redirect()->route('blog.contactus.index')->withStatus(__('Message Sent Successfully.'));
    }
}
