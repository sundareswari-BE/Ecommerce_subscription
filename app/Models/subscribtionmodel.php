<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribtionmodel extends Model
{
    protected $table="subscribtion";
    protected $fillable=[
        'user_id',
        'subscribtion_amount',
        'subscribed_limitdate',
        'upgradeDate',
    ];
    use HasFactory;
    public static function storeSubscriptionData($data)
    {
        subscribtionmodel::create([
        'user_id'=>$data['userId'],
        'subscribed_limitdate' => $data['subscriptionLimitDate'],
        'upgradeDate' => $data['upgradeDate'],
        'subscribtion_amount' => $data['subscriptionAmount'],
        ]);
        
    }



    use HasFactory;
}
