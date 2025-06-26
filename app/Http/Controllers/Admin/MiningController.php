<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mining;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\SubscribedMiningPlan;

class MiningController extends Controller
{
    //
    public function mining_settings(){
        $miningPlans = Mining::all();
        return view('Adminview.manage_mining', compact('miningPlans'));
    }

    public function store(Request $request){
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_amount_min' => 'required|numeric|min:0',
            'plan_amount_max' => 'required|numeric|min:0',
            'plan_roi' => 'required|integer|min:1',
            'plan_duration' => 'required|integer|min:1',
            'Coin_img' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Get the uploaded image file
        $uploadedImage = $request->file('Coin_img');

        // Generate a unique filename for the uploaded image
        $filename = time() . '_' . $uploadedImage->getClientOriginalName();



        // // Store the image in a location within the 'public' disk
        // $imagePath = $uploadedImage->store('proof_images', 'public');
        // Store the image in a location within the 'public' disk with a custom filename
        $imagePath = $uploadedImage->storeAs('mining_img', $filename, 'public');

        

        SubscribedMiningPlan::create([
            'name' => $request->plan_name,
            'min_amount' => $request->plan_amount_min,
            'max_amount' => $request->plan_amount_max,
            'duration' => $request->plan_duration,
            'roi' => $request->plan_roi,
            'Coin_img' => $filename,
        ]);


        return redirect()->back()->with('success', 'Plan created successfully!');


    }

    public function delete($id){
        $plan = Mining::findOrFail($id);
        $plan->delete();
        return redirect()->back()->with('success', 'Plan deleted successfully!');
    }


    public function subscribe(Request $request, $id)



    {
 
       
        $plan = Mining::findOrFail($id);
        $user = auth()->user();


        

        // Validate the request
        $request->validate([
            'amount' => "required|numeric|min:{$plan->min_amount}|max:{$plan->max_amount}",
        ]);

        $investmentAmount = $request->amount;
        $profit = $plan->roi / 100 * $investmentAmount;

        // Check if user has sufficient balance
        $minAmount = $plan->min_amount;

        if ($user->walletbalance < $minAmount) {
            return redirect()->back()->withErrors(['message' => 'Insufficient wallet balance!']);
        }

        // Deduct the investment amount from wallet balance
        $user->walletbalance -= $investmentAmount;
        $user->save();

        // Create a new subscription
        $startDate = Carbon::now();
        SubscribedMiningPlan::create([
            'fullname' => $user->fullname,
            'email' => $user->email,
            'amount' => $investmentAmount,
            'profit' => $profit,
            'plan' => $plan->name,
            'transid' => Str::uuid()->toString(),
            'Withdrawaldate' => Carbon::now()->addDays($plan->duration), // Set withdrawal date
            'dateadd' => $startDate,
        ]);

        return redirect()->back()->with('success', 'You have successfully subscribed to the plan!');
    }
}
