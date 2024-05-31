<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class MyModel extends Authenticatable
{
    use HasFactory;

    protected $table = "userdata";
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
    ];

    public static function add($data)
    {
        MyModel::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'number' => $data['number'],
        'password' => Hash::make($data['password']),
    ]);
      
    }
    public static function displayformdata($id ,$newSubscriptionAmount)
    {
        $userId = auth()->id(); 
        self::where('id', $userId)->update(['subscription' => $newSubscriptionAmount]);
}

public static function storeSubscriptionupdateData($updated_amount)
{
    $user = mymodel::findOrFail(auth()->id());
    $user->subscription = $updated_amount; 
    $user->save();
}}



    