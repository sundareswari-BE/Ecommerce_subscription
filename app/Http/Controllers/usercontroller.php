<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Mymodel;
use App\Models\categorymodel;
use App\Models\productmodel;
use App\Models\subscribtionmodel;

class usercontroller extends Controller
{
    public function signinForm()
    {
        $data['button'] = "submit";
        $data['name'] = "";
        $data['email'] = "";
        $data['password'] = "";
        $data['number'] = "";
        return view('userpages.login', $data);
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'number' => 'required',
        ]);
        $email = $request->email;
        $email_check = MyModel::where('email', '=', $email)->first();

        if (!$email_check == "") {
            return back()->with('message', 'Email already registered')->withInput();
        } else {
            MyModel::add($request->all());
        }
        return redirect()->route('login')->with('message', 'Registered successfully');
    }





    public function loginForm()
    {
       $data_log['button'] = "submit";
        $data_log['log_email'] = "";
        $data_log['log_password'] = "";
        return view('userpages.login', $data_log);
    }




    public function check(Request $request)
    {
        $request->validate([
            'log_email' => 'required|email',
            'log_password' => 'required',
        ]);
    
        $credentials = [
            'email' => $request->input('log_email'),
            'password' => $request->input('log_password'),
        ];
    
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->name !== 'admin') {
              $subscription = subscribtionmodel::where('user_id', $user->id)->first();
                if ($subscription) {
                   //$currentDate = '2025-05-30';
                   $currentDate = date('Y-m-d');
                    $limitDate = $subscription->subscribed_limitdate;
                    $upgradeDate = $subscription->upgradeDate;
                  if ($currentDate >= $limitDate) {
                        return redirect()->route('subcribtionformshowdata')->with('message', 'Subscription limit reached. Access denied.');
                    } elseif ($currentDate >= $upgradeDate) {
                        return redirect()->route('userdashboard')->with('message', 'Upgrade your subscription.');
                    } else {
                        return redirect()->route('userdashboard');
                    }
                   } else {
                    return redirect()->route('subcribtionformshowdata');
                }
            } 
        } else {
         return back()->with('message', 'Wrong Login Details')->withInput();
        }
    }




    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'You have been logged out successfully.');
    }


    public function subscribtionpage(Request $request)
    {
        return view('userpages.subscribtionpage');
    }



    public function userdashboard(Request $request)
    {
        $userId = Auth::id();
        $subscription = SubscribtionModel::where('user_id', $userId)->first();
        $userData = MyModel::findOrFail($userId);
        $products = ProductModel::all(); 
        $categories = categorymodel::all(); 
        $activeSubscription = false; 
        $reachedUpgradeDate = false;
        $categoryNames = [];
    
        if ($subscription) {
            $currentDate = now()->format('Y-m-d');
    
            if ($currentDate < $subscription->upgradeDate) {
                $activeSubscription = true;
            } elseif ($currentDate >= $subscription->upgradeDate) {
                $reachedUpgradeDate = true;      
            }
        } else {
            return redirect()->route('subcribtionformshowdata')->with('message', 'You do not have an active subscription.');
        }
    
        foreach ($products->groupBy('category_id') as $categoryId => $categoryProducts) {
            $categoryNames[$categoryId] = categorymodel::find($categoryId)->category_name;
        }
    
        return view('userpages.userdashboard', [
            'products' => $products,
            'categories' => $categories,
            'userData' => $userData,
            'activeSubscription' => $activeSubscription,
            'reachedUpgradeDate' => $reachedUpgradeDate,
            'categoryNames' => $categoryNames,
        ]);
    }
    
    

    // ----------------------------------------------suscribeform------------------------


    public function subcribtionformshowdata(Request $request)
    {
        $id = Auth::id();
        $userData = MyModel::findOrFail($id);
        $subscription = SubscribtionModel::where('user_id', $id)->first();
     
        $activeSubscription = false;
        $reachedUpgradeDate = false;
        
        if ($subscription) {
            $currentDate = now()->format('Y-m-d');
            if ($currentDate < $subscription->upgradeDate) {
                $activeSubscription = true;
            } elseif ($currentDate >= $subscription->upgradeDate) {
                $reachedUpgradeDate = true;
            }
        } else {
            // return redirect()->with('message','subscription_not_found');
        }
        
        return view('userpages.subscribtionpage', [
            
            'userData' => $userData,
            'activeSubscription' => $activeSubscription,
            'reachedUpgradeDate' => $reachedUpgradeDate,
        ]);
    }








    
    public function subscribtionformstoredata(Request $request)
    {
        $data['userId'] = Auth::id();
        $data['subscriptionAmount'] = $request->input('subscription_amount');
        $currentDate = date('Y-m-d');
        $data['subscriptionLimitDate'] = date('Y-m-d', strtotime($currentDate . ' +1 year'));
        $data['upgradeDate'] = date('Y-m-d', strtotime($currentDate . ' +8 months'));


        subscribtionmodel::storeSubscriptionData($data);
        $user = MyModel::findOrFail($data['userId']);
        $db_subscriptionamount = $user->subscription;

        $updated_amount = $db_subscriptionamount - $data['subscriptionAmount'];

        MyModel::storeSubscriptionupdateData($updated_amount);
        

        return redirect()->route('userdashboard')->with('message', 'You are subscribed');;
    }


 
    
     
            public function search(Request $request)
            {
                $searchQuery = $request->input('search');
                
                
                $products = Productmodel::where('product_name', 'like', '%' . $searchQuery . '%')
                                    ->orWhere('description', 'like', '%' . $searchQuery . '%')
                                    ->get();
            
      
                $categories = Categorymodel::where('category_name', 'like', '%' . $searchQuery . '%')->get();
        
                $request->session()->put('searchResults', ['products' => $products, 'categories' => $categories]);
            
                return redirect()->route('categoryPage');
            }
            
    
}




