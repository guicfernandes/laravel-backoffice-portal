<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DateTime;
use Carbon\Traits\Date;
use App\Message;
use App\Job;
use App\Employee;

class MessageController extends Controller
{
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
            'start_date'=>'required',
            'expiration_date'=>'required'
        ]);

        $message = new Message([
            'subject' => $request->get('subject'),
            'content' => $request->get('content'),
            'start_date' => date("Y-m-d", strtotime(request('start_date'))),
            'expiration_date' => date("Y-m-d", strtotime(request('expiration_date'))),
            'change_event_date' => date('Y-m-d H:i:s'),
            'active' => true,
            'employee_id' => 1
            // 'employee_id' => $employee->get('id')
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
        //
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
            'start_date'=>'required',
            'expiration_date'=>'required'
        ]);

        $message = Message::find($id);
        $message->subject =  $request->get('subject');
        $message->content = $request->get('content');
        $message->start_date = $request->get('start_date');
        $message->expiration_date = $request->get('expiration_date');
        $message->change_event_date = date('Y-m-d H:i:s');
        $message->active = true;
        $message->save();

        return redirect('/messages')->with('success', 'Message updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        // $message->delete();

        $message->active = false;
        $message->save();

        return redirect('/messages')->with('success', 'Message deleted!');
    }
}
