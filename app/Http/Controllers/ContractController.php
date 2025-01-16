<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\House;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contracts',[
            'contracts'=>Contract::all()->sortBy("id")
        ]); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index_buyer(string $id)
    {
        return view('contracts_buyer',[
            'contracts_buyer'=>Contract::all()->where('buyer_id',$id)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contract_create',[
            'houses' => House::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'num' => 'required|string',
            'date_begin' => 'required|date',
            'date_end' => 'required|date',
            'house_id' => 'required|integer'
        ]);
        $contract = new Contract($validated);
        $price = House::all()->where("id",$contract->house_id)->first()->price;
        $date_from = DateTime::createFromFormat( 'U', strtotime($contract->date_begin));
        $date_to = DateTime::createFromFormat( 'U', strtotime($contract->date_end));
        $days = date_diff($date_to,$date_from);
        $total_price = $price * ($days->d+1);
        $contract->price = $total_price;
        $contract->buyer_id = 1; 
        $contract->save();
        return redirect("/contract");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function confirm(string $id)
    {
        return view('contract_confirm',[
            'contract' => Contract::all()->where("id",$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_confirmed(Request $request, string $id)
    {
        if (!Gate::allows('confirm_contract')){
            return redirect('/error')->with('message','У вас здесь нет власти');
        }
        $validated = $request->validate([
            'confirmed' => 'required|boolean'
        ]);
        $contract = Contract::all()->where("id",$id)->first();
        $contract-> confirmed = $validated['confirmed'];
        $contract -> save();
        return redirect("/contract");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('delete_contract',Contract::all()->where("id",$id)->first())){
            return redirect('/contract')->withErrors(['contract'=>'ошибка']);
        }
        $contract = Contract::all()->where("id",$id)->first();
        $bills = $contract->bills();
        $bills -> delete();
        $contract -> delete();
        return redirect("/contract");
    }
}
