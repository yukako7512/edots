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
        public function index(){
        
        $points = $this->point_sum();
        return view ('events.index', ['points' => $points]);
    }
    // 各カテゴリーページへ行くためのファンクション
    public function sports(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'sports')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.sport_index', ['items' => $items, 'points' => $points]);
        
    } 
    public function beauty(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'beauty')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.beauty_index', ['items' => $items, 'points' => $points]);
        
    }
    public function arts(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'arts')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.art_index', ['items' => $items, 'points' => $points]);
        
    }
    public function technology(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'technology')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.technology_index', ['items' => $items, 'points' => $points]);
        
    }
    public function nature(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'nature')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.nature_index', ['items' => $items, 'points' => $points]);
        
    }
    public function language(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'language')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.language_index', ['items' => $items, 'points' => $points]);
        
    }
    public function food(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'food')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.food_index', ['items' => $items, 'points' => $points]);
        
    }
    public function others(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'others')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.others_index', ['items' => $items, 'points' => $points]);
        
    }

    public function create(){
        
        $points = $this->point_sum();
        $item = new Event;
        return view ('events.post', ['item' => $item, 'points' => $points]);
    }
    
    public function store(Request $request){
        
        $points = $this->point_sum();
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
        return view ('events.postdone', ['item' => $item, 'points' => $points]);
    }
    
    public function arrangedone($event_id, $attendiee_id){
        
        $event = Event::where('id', $event_id);
        $event->update(['status'=>'done']);
        
        return redirect()->back();
        
    }
    
    // event infoに行くためのファンクション
    public function eventshow($id){
        
        $points = $this->point_sum();
        $event = Event::find($id);
        $user = $event->user;
        $negative_or_positive = Transaction::points_compare($event);
        return view ('events.eventinfo', ['event' => $event, 
                                          'user' => $user, 
                                          'negative_or_positive' => $negative_or_positive,
                                          'points' => $points
                                          ]);
    }
    
    public function requestdone($id){
            
            $points = $this->point_sum();
            $user_id = \Auth::user()->id;
            $event_id = $id;
            $transactions = Event::find($id)->point;
            
            $user_events_param = ['user_id'=> $user_id,
                                  'event_id'=> $event_id,
                                  'relationship'=>'ongoing'
                                  ];
                                  
            $transactions_param = ['user_id'=> $user_id,
                            'event_id'=> $event_id,
                            'transactions' => -$transactions
                            ];
                      
            \DB::table('user_events')->insert($user_events_param);
            \DB::table('transactions')->insert($transactions_param);
            
            return view('events.requestdone', ['points' => $points]);
                
            }
}
