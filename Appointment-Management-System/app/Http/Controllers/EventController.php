<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Event;
use App\Models\User;
use App\Models\eventuser;
use Illuminate\Support\Facades\Storage;
use Auth;



class EventController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function home(){
        $upcomingEvents = Event::where('start', '>=', now())
            ->orderBy('start', 'asc')
            ->limit(3)
            ->get();

        return view('home', compact('upcomingEvents'));
    }

    public function profile()
    {
        $user = auth()->user(); // Get the currently authenticated user

        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('editProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'phonenumber' => 'required|string|max:15',
            'job' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'phonenumber' => $request->phonenumber,
            'job' => $request->job,
            'organization' => $request->organization,
            'email' => $request->email,
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function add(Request $request){
        $request->validate([
            'eventName' => 'required|string|max:255',
            'eventDescription' => 'required|string',
            'organization' => 'required|string|max:255',
            'eventPlace' => 'required|string|max:255',
            'eventStart' => 'required|date',
            'eventEnd' => 'required|date',
            'eventTime' => 'required',
            'seat' => 'required|integer|min:0',
            'image' => 'nullable|file|image|max:2048',
        ]);
        

        $event = new Event([
            'name' => $request->eventName,
            'description' => $request->eventDescription,
            'organization' => $request->organization,
            'place' => $request->eventPlace,
            'start' => $request->eventStart,
            'end' => $request->eventEnd,
            'time' => $request->eventTime,
            'seat' => $request->seat,
            'image' => $request->file('image') ? $request->file('image')->store('image', 'public') : null,
        ]);
        $event->user()->associate(auth()->user());
        $event->save();

        return redirect()->route('myEvent')->with('success', 'Event added successfully.');
    }

    public function show(){
        $viewEvent=DB::table('events')->where('events.user_id','=',Auth::id())->get();

        return view('myEvent')->with('events', $viewEvent);
    }

    public function showAll(){
        $viewEvent=Event::all();
        return view('showAllEvent')->with('events', $viewEvent);
    }
    

    public function edit($id){
        $event=Event::all()->where('id',$id);
        return view('editEvent')->with('events', $event);
    }
    

    public function update(){
        $r=request();
        $events=Event::find($r->id);
        if($r->hasFile('image')){
            if ($events->image) {
                Storage::disk('public')->delete($events->image);
            }
            $imagePath = $r->file('image')->store('images', 'public');
            $events->image = $imagePath;
        }

        $events->name=$r->eventName;
        $events->description=$r->eventDescription;
        $events->organization=$r->organization;
        $events->place=$r->eventPlace;
        $events->start=$r->eventStart;
        $events->end=$r->eventEnd;
        $events->time=$r->eventTime;
        $events->seat=$r->seat;

        $events->save();
        return redirect()->route('myEvent');
        
    }
    
    public function detail($id){
        $events=Event::all()->where('id',$id);
        return view('eventDetail')->with('events', $events);
    }

    public function delete($id){
        $events=Event::find($id);
        $events->delete();//delete from events where id='$id'
        return redirect()->route('myEvent');
    }

    public function joinEvent (Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::find($request->event_id);
        $user = Auth::user();


        if ($event->seat > 0) {
            $event->seat -= 1;
            $event->save();
        
            $event->users()->attach($user->id);
            session()->put('joined_event_' . $event->id, true);
            
            return redirect()->route('showAllEvent')->with('success', 'You have successfully joined the event.');
        } else {
            return redirect()->route('showAllEvent')->with('error', 'No remaining seats available.');
        }
    }
}



