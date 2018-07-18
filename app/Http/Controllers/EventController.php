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
            if($id%6==0){
                $icon="arts/art1.jpg";
            }if($id%6==1){
                $icon="arts/art2.jpg";
            }if($id%6==2){
                $icon="arts/art3.jpg";
            }if($id%6==3){
                $icon="arts/art4.jpg";
            }if($id%6==4){
                $icon="arts/art5.jpg";
            }if($id%6==5){
                $icon="arts/art6.jpg";
            };
            
        // } if($event->category=="Language"){
        //     if($id%6==0){
        //         $icon="language/language1.jpeg";
        //     }if($id%6==1){
        //         $icon="language/language2.jpeg";
        //     }if($id%6==2){
        //         $icon="language/language3.jpeg";
        //     }if($id%6==3){
        //         $icon="language/language4.jpeg";
        //     }if($id%6==4){
        //         $icon="language/language5.jpeg";
        //     }if($id%6==5){
        //         $icon="language/language6.jpeg";
        //     };
            
        // } if($event->category=="Sports"){
        //     if($id%11==0){
        //         $icon="sports/sports1.jpeg";
        //     }if($id%11==1){
        //         $icon="sports/sports2.jpeg";
        //     }if($id%11==2){
        //         $icon="sports/sports3.jpeg";
        //     }if($id%11==3){
        //         $icon="sports/sports4.jpeg";
        //     }if($id%11==4){
        //         $icon="sports/sports5.jpeg";
        //     }if($id%11==5){
        //         $icon="sports/sports6.jpeg";
        //     }if($id%11==6){
        //         $icon="sports/sports7.jpeg";
        //     }if($id%11==7){
        //         $icon="sports/sports8.jpeg";
        //     }if($id%11==8){
        //         $icon="sports/sports9.jpeg";
        //     }if($id%11==9){
        //         $icon="sports/sports10.jpeg";
        //     }if($id%11==10){
        //         $icon="sports/sports11.jpeg";
        //     };
            
        // }if($event->category=="Others"){
        //     if($id%9==0){
        //         $icon="others/others1.jpeg";
        //     }if($id%9==1){
        //         $icon="others/others2.jpeg";
        //     }if($id%9==2){
        //         $icon="others/others3.jpeg";
        //     }if($id%9==3){
        //         $icon="others/others4.jpeg";
        //     }if($id%9==4){
        //         $icon="others/others5.jpeg";
        //     }if($id%9==5){
        //         $icon="others/others6.jpeg";
        //     }if($id%9==6){
        //         $icon="others/others7.jpeg";
        //     }if($id%9==7){
        //         $icon="others/others8.jpeg";
        //     }if($id%9==8){
        //         $icon="others/sports9.jpeg";
        //     };
        // }if($event->category=="Technology"){
        //     if($id%10==0){
        //         $icon="technology/Technology1.jpeg";
        //     }if($id%10==1){
        //         $icon="technology/Technology2.jpeg";
        //     }if($id%10==2){
        //         $icon="technology/Technology3.jpeg";
        //     }if($id%10==3){
        //         $icon="technology/Technology4.jpeg";
        //     }if($id%10==4){
        //         $icon="technology/Technology5.jpeg";
        //     }if($id%10==5){
        //         $icon="technology/Technology6.jpeg";
        //     }if($id%10==6){
        //         $icon="technology/Technology7.jpeg";
        //     }if($id%10==7){
        //         $icon="technology/Technology8.jpeg";
        //     }if($id%10==8){
        //         $icon="technology/Technology9.jpeg";
        //     }if($id%10==9){
        //         $icon="technology/Technology10.jpeg";
        //     };
            
        // }if($event->category=="Histotry"){
        //     if($id%10==0){
        //         $icon="history/history1.jpeg";
        //     }if($id%10==1){
        //         $icon="history/history2.jpeg";
        //     }if($id%10==2){
        //         $icon="history/history3.jpeg";
        //     }if($id%10==3){
        //         $icon="history/history4.jpeg";
        //     }if($id%10==4){
        //         $icon="history/history5.jpeg";
        //     }if($id%10==5){
        //         $icon="history/history6.jpeg";
        //     };
            
        // }if($event->category=="Beauty"){
        //     if($id%7==0){
        //         $icon="beauty/beauty1.jpeg";
        //     }if($id%7==1){
        //         $icon="beauty/beauty2.jpeg";
        //     }if($id%7==2){
        //         $icon="beauty/beauty3.jpeg";
        //     }if($id%7==3){
        //         $icon="beauty/beauty4.jpeg";
        //     }if($id%7==4){
        //         $icon="beauty/beauty5.jpeg";
        //     }if($id%7==5){
        //         $icon="beauty/beauty6.jpeg";
        //     }if($id%7==6){
        //         $icon="beauty/beauty7.jpeg";
        //     };
        // }if($event->category=="Nature"){
        //     if($id%8==0){
        //         $icon="nature/nature1.jpeg";
        //     }if($id%8==1){
        //         $icon="nature/nature2.jpeg";
        //     }if($id%8==2){
        //         $icon="nature/nature3.jpeg";
        //     }if($id%8==3){
        //         $icon="nature/nature4.jpeg";
        //     }if($id%8==4){
        //         $icon="nature/nature5.jpeg";
        //     }if($id%8==5){
        //         $icon="nature/nature6.jpeg";
        //     }if($id%8==6){
        //         $icon="nature/nature7.jpeg";
        //     }if($id%8==7){
        //         $icon="nature/nature8.jpeg";
        //     };
        // }if($event->category=="Food"){
        //     if($id%9==0){
        //         $icon="food/food1.jpeg";
        //     }if($id%9==1){
        //         $icon="food/food2.jpeg";
        //     }if($id%9==2){
        //         $icon="food/food3.jpeg";
        //     }if($id%9==3){
        //         $icon="food/food4.jpeg";
        //     }if($id%9==4){
        //         $icon="food/food5.jpeg";
        //     }if($id%9==5){
        //         $icon="food/food6.jpeg";
        //     }if($id%9==6){
        //         $icon="food/food7.jpeg";
        //     }if($id%9==7){
        //         $icon="food/food8.jpeg";
        //     }if($id%9==8){
        //         $icon="food/food9.jpeg";
        //     };
        // }
        
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
