<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use \DateTime;
use Carbon\Traits\Date;
use App\Message;
use App\Job;
use App\Employee;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'content'=>'required',
            'start_date'=>'required|date|date_format:d-m-Y',
            'expiration_date'=>'required|date|date_format:d-m-Y|after:yesterday'
        ]);

        $message = new Message([
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
            'start_date' => date("Y-m-d", strtotime(request('start_date'))),
            'expiration_date' => date("Y-m-d", strtotime(request('expiration_date'))),
            'change_event_date' => date('Y-m-d H:i:s'),
            'active' => true,
            'employee_id' => Auth::id()
        ]);

        $message->save();
        return redirect('/messages')->with('success', 'Message created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);

        return view('messages.view', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject'=>'required',
            'content'=>'required',
            'start_date'=>'required|date|date_format:d-m-Y',
            'expiration_date'=>'required|date|date_format:d-m-Y|after:yesterday'
        ]);

        $message = Message::find($id);
        $message->subject =  $request->get('subject');
        $message->content = $request->get('content');
        $message->start_date = date("Y-m-d", strtotime(request('start_date')));
        $message->expiration_date = date("Y-m-d", strtotime(request('expiration_date')));
        $message->change_event_date = date('Y-m-d H:i:s');
        $message->active = true;

        $this->authorize('update', $message);
        
        $message->save();

        return redirect('/messages')->with('success', 'Message updated!');
    }

    /**
     * Cancel, ie making it inactive, the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        // $message->delete();

        $this->authorize('update', $message);

        $message->active = false;
        $message->save();

        return redirect('/messages')->with('success', 'Message canceled!');
    }
}
