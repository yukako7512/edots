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
        public function aboutus(){
            return view('aboutus');
        }
        
        public function int_p(){
            $points = $this->point_sum();
            $exist_or_not = User::int_p_check();
            return view ('auth.int_p', ['points' => $points,
                                        'exist_or_not'=>$exist_or_not]);
        }
        
        public function firstindex(){
        $user = \Auth::user();

        $transaction = new Transaction;
        $transaction->event_id = 0;
        $transaction->user_id = $user->id;
        $transaction->transactions = 1000;
        $transaction->save();
        return redirect('/index');

    }
        
        public function index(){
        if(\Auth::check()){
        $points = $this->point_sum();
        return view ('events.index', ['points' => $points]);
        }else{
            return view('welcome');
        }
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
    
     public function history(){
        
        $points = $this->point_sum();
        $items = Event::where('category', 'history')->orderBy('created_at', 'desc')->get();
        return view ('events.categories.history_index', ['items' => $items, 'points' => $points]);
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

        if($event->category=="Arts"){
            if($id%5==0){
                $icon="arts/art1.jpg";
            }if($id%5==1){
                $icon="arts/art2.jpg";
            }if($id%5==2){
                $icon="arts/art3.jpg";
            }if($id%5==3){
                $icon="arts/art4.jpg";
            }if($id%5==4){
                $icon="arts/art5.jpg";
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
