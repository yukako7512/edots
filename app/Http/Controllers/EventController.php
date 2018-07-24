<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

use App\Transaction;
use App\Review;
use App\User;
use App\UserEvent;
// use App\Http\Controllers\Auth;

class EventController extends Controller
{       
        public function aboutus(){
            return view('aboutus');
        }
        
        public function int_p(){
            $points = $this->point_sum();
            $notification = $this->notification();
            $exist_or_not = User::int_p_check();
            
            if($exist_or_not){
                
                return redirect('/index');
                
            }else{
                
                return view ('auth.int_p', ['points' => $points,
                                        'notification'=> $notification
                                        ]);
            }
        }
        
        public function firstindex(){
            
        $exist_or_not = User::int_p_check();
        
        if($exist_or_not){
            
            return redirect('/index');
            
        }else{    
            
        $user = \Auth::user();

        $transaction = new Transaction;
        $transaction->event_id = 1;
        $transaction->user_id = $user->id;
        $transaction->transactions = 1000;
        $transaction->save();
        
        return redirect('/index');
        }

    }
        
        public function index(){
        if(\Auth::check()){
        $points = $this->point_sum();
        $notification = $this->notification(); 
        return view ('events.index', ['points' => $points,
                                      'notification'=> $notification]);
        
        }else{
            return view('welcome');
        }
    }
    // 各カテゴリーページへ行くためのファンクション
    
    public function sports(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Sports')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }
        return view ('events.categories.sport_index', ['events' => $events, 
                                                       'points' => $points,
                                                       'notification'=> $notification,
                                                       'attendee_number'=>$attendee_number]);
        
    } 
    public function beauty(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Beauty')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.beauty_index', ['events' => $events, 
                                                        'points' => $points,
                                                        'notification'=> $notification,
                                                        'attendee_number'=>$attendee_number]);
        
    }
    public function arts(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Arts')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.art_index', ['events' => $events, 
                                                     'points' => $points,
                                                     'notification'=> $notification,
                                                     'attendee_number'=>$attendee_number]);
        
    }
    public function technology(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Technology')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.technology_index', ['events' => $events, 
                                                            'points' => $points,
                                                            'notification'=> $notification,
                                                            'attendee_number'=>$attendee_number]);
        
    }
    public function nature(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Nature')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.nature_index', ['events' => $events, 
                                                        'points' => $points,
                                                        'notification'=> $notification,
                                                        'attendee_number'=>$attendee_number]);
        
    }
    public function language(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Language')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.language_index', ['events' => $events, 
                                                          'points' => $points,
                                                          'notification'=> $notification,
                                                          'attendee_number'=>$attendee_number]);
        
    }
    public function food(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Food')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number = 0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.food_index', ['events' => $events, 
                                                      'points' => $points,
                                                      'notification'=> $notification,
                                                      'attendee_number'=>$attendee_number]);
        
    }
    public function others(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'Others')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number=0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.others_index', ['events' => $events, 
                                                        'points' => $points,
                                                        'notification'=> $notification,
                                                        'attendee_number'=>$attendee_number]);
        
    }
    
     public function history(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $events = Event::where('category', 'History')->where('status', 'ongoing')->orderBy('created_at', 'desc')->get();
        $attendee_number=0;
        foreach ($events as $event){
            $attendee_number=UserEvent::where('event_id', $event->id)->count();
        }        
        return view ('events.categories.history_index', ['events' => $events, 
                                                        'points' => $points,
                                                        'notification'=> $notification,
                                                        'attendee_number'=>$attendee_number]);
     }

    public function create(){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $event = new Event;
        return view ('events.post', ['event' => $event, 
                                     'points' => $points,
                                     'notification'=> $notification,
                                     ]);
    }
    
    public function store(Request $request){
        
        $request->validate([
        'title' => 'required|max:15', 
        'category' => 'required',               
        'date' => 'required|date',          
        'place' => 'required|max:20',  
        'point' => 'required|integer', 
        'max_capacity' => 'required|integer',
        'content' => 'required|max:500'
      ]);
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $event = new Event;
        $event->title = $request->title;
        $event->content = $request->content;
        $event->category = $request->category;
        $event->place = $request->place;
        $event->date = $request->date;
        $event->max_capacity =$request->max_capacity;
        $user = \Auth::user();
        $event->user_id=$user->id;
        $event->point = $request->point;
        $event->status = 'ongoing';
        $event->save();
        return view ('events.postdone', ['event' => $event, 
                                         'points' => $points,
                                         'notification'=> $notification]);
    }
    
    public function arrangedone($event_id, $attendiee_id){
        
        $event = Event::where('id', $event_id);
        $event->update(['status'=>'done']);
        
        return redirect()->back();
        
    }
    
    // event infoに行くためのファンクション
    public function eventshow($id){
        
        $points = $this->point_sum();
        $notification = $this->notification(); 
        $event = Event::find($id);
        $user = $event->user;
        $attendees = UserEvent::where('event_id', $id)->get();

        if($event->category=="Arts"){
            if($id%5==0){
                $icon="arts/art1.jpeg";
            }if($id%5==1){
                $icon="arts/art2.jpeg";
            }if($id%5==2){
                $icon="arts/art3.jpeg";
            }if($id%5==3){
                $icon="arts/art4.jpeg";
            }if($id%5==4){
                $icon="arts/art5.jpeg";
            };
            
        } if($event->category=="Language"){
            if($id%5==0){
                $icon="language/language1.jpeg";
            }if($id%5==1){
                $icon="language/language2.jpeg";
            }if($id%5==2){
                $icon="language/language3.jpeg";
            }if($id%5==3){
                $icon="language/language4.jpeg";
            }if($id%5==4){
                $icon="language/language5.jpeg";
            };
            
        } if($event->category=="Sports"){
            if($id%5==0){
                $icon="sports/sports1.jpeg";
            }if($id%5==1){
                $icon="sports/sports2.jpeg";
            }if($id%5==2){
                $icon="sports/sports3.jpeg";
            }if($id%5==3){
                $icon="sports/sports4.jpeg";
            }if($id%5==4){
                $icon="sports/sports5.jpeg";
            };
            
        }if($event->category=="Others"){
            if($id%5==0){
                $icon="others/others1.jpeg";
            }if($id%5==1){
                $icon="others/others2.jpeg";
            }if($id%5==2){
                $icon="others/others3.jpeg";
            }if($id%5==3){
                $icon="others/others4.jpeg";
            }if($id%5==4){
                $icon="others/others5.jpeg";
            };
        
        }if($event->category=="Technology"){
            if($id%5==0){
                $icon="technology/Technology1.jpeg";
            }if($id%5==1){
                $icon="technology/Technology2.jpeg";
            }if($id%5==2){
                $icon="technology/Technology3.jpeg";
            }if($id%5==3){
                $icon="technology/Technology4.jpeg";
            }if($id%5==4){
                $icon="technology/Technology5.jpeg";
            };
            
        }if($event->category=="History"){
            if($id%5==0){
                $icon="history/history1.jpeg";
            }if($id%5==1){
                $icon="history/history2.jpeg";
            }if($id%5==2){
                $icon="history/history3.jpeg";
            }if($id%5==3){
                $icon="history/history4.jpeg";
            }if($id%5==4){
                $icon="history/history5.jpeg";
            };
            
        }if($event->category=="Beauty"){
            if($id%5==0){
                $icon="beauty/beauty1.jpeg";
            }if($id%5==1){
                $icon="beauty/beauty2.jpeg";
            }if($id%5==2){
                $icon="beauty/beauty3.jpeg";
            }if($id%5==3){
                $icon="beauty/beauty4.jpeg";
            }if($id%5==4){
                $icon="beauty/beauty5.jpeg";
            };
            
        }if($event->category=="Nature"){
            if($id%5==0){
                $icon="nature/nature1.jpeg";
            }if($id%5==1){
                $icon="nature/nature2.jpeg";
            }if($id%5==2){
                $icon="nature/nature3.jpeg";
            }if($id%5==3){
                $icon="nature/nature4.jpeg";
            }if($id%5==4){
                $icon="nature/nature5.jpeg";
            };
            
        }if($event->category=="Food"){
            if($id%5==0){
                $icon="food/food1.jpeg";
            }if($id%5==1){
                $icon="food/food2.jpeg";
            }if($id%5==2){
                $icon="food/food3.jpeg";
            }if($id%5==3){
                $icon="food/food4.jpeg";
            }if($id%5==4){
                $icon="food/food5.jpeg";
            };
        }
        
        $negative_or_positive = Transaction::points_compare($event);
        return view ('events.eventinfo', ['event' => $event, 
                                          'user' => $user, 
                                          'icon' =>$icon,
                                          'negative_or_positive' => $negative_or_positive,
                                          'points' => $points,
                                          'notification'=> $notification,
                                          'attendees'=> $attendees
                                          ]);
    }
    
    public function requestdone($id){
            
            $points = $this->point_sum();
            $notification = $this->notification(); 
            $user_id = \Auth::user()->id;
            $event_id = $id;
            $transactions = Event::find($id)->point;

            if(UserEvent::where('user_id', $user_id)->where('event_id', $event_id)->where('relationship','ongoing')->exists() OR Event::where('id', $event_id)->value('status')=='done'){
                return redirect()->back();
            }else
            
            {   
                $user_events_param = ['user_id'=> $user_id,
                                      'event_id'=> $event_id,
                                      'relationship'=>'ongoing',
                                      'read'=>'unread'
                                      ];
                                      
                $transactions_param = ['user_id'=> $user_id,
                                'event_id'=> $event_id,
                                'transactions' => -$transactions
                                ];
                          
                \DB::table('user_events')->insert($user_events_param);
                \DB::table('transactions')->insert($transactions_param);
                
                $attendee_number=UserEvent::where('event_id', $event_id)->count();
                if($attendee_number==Event::where('id', $event_id)->value('max_capacity')){
                    $event = Event::where('id', $event_id);
                    $event->update(['status'=>'done']);
                }
                
                $points = $this->point_sum();
                
                return view('events.requestdone', ['points' => $points,
                                                   'notification'=> $notification]);
            }
                
        }
}
