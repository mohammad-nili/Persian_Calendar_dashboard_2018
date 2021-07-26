<?php

namespace App\Http\Controllers;

use App\TermPeriod;
use Illuminate\Http\Request;

class TermPeriodController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
            'start' => 'required',
            'end' => 'required',
        ]);
        $start = $request->input('start');
        $end = $request->input('end');
        $start =substr(toMiladi($start), 0,-6);
        $end = substr(toMiladi($end), 0,-6);
        if(TermPeriod::where('user_id',auth()->user()->id)->get()->count() >0 ){
            $term = TermPeriod::where('user_id',auth()->user()->id)->get()[0];
            $term->start = $start;
            $term->end = $end;
            $term->save();
        }
        else{
            $period = new TermPeriod();
            $period->start = $start;
            $period->end = $end;
            $period->user_id = auth()->user()->id;//auth->user()->id
            $period->save();
        }

        return redirect('/');
    }
}
