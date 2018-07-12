<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

use App\Transaction;
use App\Review;
use App\User;
// use App\Http\Controllers\Auth;

class EventController extends Controller
{
    // 各カテゴリーページへ行くためのファンクション
    public function sports(){
        $items = Event::where('category', 'sports')->get();
        return view ('events.categories.sport_index', ['items' => $items]);
        
    } 
    public function beauty(){
        $items = Event::where('category', 'beauty')->get();
        return view ('events.categories.beauty_index', ['items' => $items]);
        
    }
    public function arts(){
        $items = Event::where('category', 'arts')->get();
        return view ('events.categories.art_index', ['items' => $items]);
        
    }
    public function technology(){
        $items = Event::where('category', 'technology')->get();
        return view ('events.categories.technology_index', ['items' => $items]);
        
    }
    public function nature(){
        $items = Event::where('category', 'nature')->get();
        return view ('events.categories.nature_index', ['items' => $items]);
        
    }
    public function language(){
        $items = Event::where('category', 'language')->get();
        return view ('events.categories.language_index', ['items' => $items]);
        
    }
    public function food(){
        $items = Event::where('category', 'food')->get();
        return view ('events.categories.food_index', ['items' => $items]);
        
    }
    public function others(){
        $items = Event::where('category', 'others')->get();
        return view ('events.categories.others_index', ['items' => $items]);
        
    }

    public function create(){
        $item = new Event;
        
        return view ('events.post', ['item' => $item]);
    }
    
    public function store(Request $request){
        $item = new Event;
        $item->title = $request->title;
        $item->content = $request->content;
        $item->category = $request->category;
        $item->place = $request->place;
        $item->date = $request->date;
        $user = \Auth::user();
        $item->user_id=$user->id;
        $item->point = $request->point;
        $item->status = 'ongoing';
        $item->save();
        return view ('events.postdone', ['item' => $item]);
    }
    
    public function arrangedone($id){
        
               
        $user = \Auth::user();

        $event = Event::where('user_id', $user->id)->where('id', $id);
        
        $arranging_events = $user->events->where('status','ongoing');
        $joining_events = $user->events_through_user_events->where('relationship','ongoing');
        $history_events = $user->events->where('status','done');
        
        $event->update(['status'=>'done']);
        
        return redirect()->back();
        
    }
    
    
    
    
    // event infoに行くためのファンクション
    public function eventshow($id){
        
        $event = Event::find($id);
        $user = $event->user;
        $negative_or_positive = Transaction::points_compare($event);
        return view ('events.eventinfo', ['event' => $event, 
                                          'user' => $user, 
                                          'negative_or_positive' => $negative_or_positive
                                          ]);
    }
    
    public function requestdone($id){

        
            $user_id = \Auth::user()->id;
            $event_id = $id;
            $transactions = Event::find($id)->point;
            
            
            $user_events_param = ['user_id'=> $user_id,
                                  'event_id'=> $event_id,
                                  'relationship'=>'ongoing'
                                  ];
                                  
            $transactions_param = ['user_id'=> $user_id,
                            'event_id'=> $event_id,
                            'transactions' => -$transactions,
                            ];
                      
            \DB::table('user_events')->insert($user_events_param);
            \DB::table('transactions')->insert($transactions_param);
            
            return view('events.requestdone');
  
    }
}
