<?php

namespace App\Http\Controllers;

use App\TermPeriod;
use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        //$data = $request->all();
        $data['title'] = $request->input('title');
        $data['start'] = toMiladi($request->input('start'));
        $data['end'] = toMiladi($request->input('end'));
        $data['user_id'] = auth()->user()->id;


        $task = new Task();
        $task->title = $request->input('title');
        $task->start = toMiladi($request->input('start'));
        $task->end = toMiladi($request->input('end'));
        $task->user_id = auth()->user()->id;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['start'] = toMiladi($request->input('start'));
        $data['end'] = toMiladi($request->input('end'));
        $task = Task::find($id);
        $task->update($data);

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect('tasks');
    }

    public function week(Request $request){
        $this->validate($request, [
            'day' => 'required',
            'time' => 'required',
            'OE' => 'required',
            'title' => 'required',
        ]);
        $start = TermPeriod::where('user_id',auth()->user()->id)->get()[0]->start;
        $end = TermPeriod::where('user_id',auth()->user()->id)->get()[0]->end;

        $time = explode('-', request('time'));
        if(request('OE') == '2'){
            $j = 0;
            $x = 14;
        }
        elseif(request('OE') == '1'){
            $j = 7;
            $x = 14;
        }else{
            $j = 0;
            $x = 7;
        }
        $day = request('day');
        $after = $day+$j;
        //return tokenize($end);
        $date = \Morilog\Jalali\jDate::forge($start)->reforge("+ $after days")->format('date');
        $date = toMilad($date);
        while (tokenize($date) < tokenize($end)) {
            //echo "tokenize(date) :>>>>".tokenize($date)."tokenize(end) >>>".tokenize($end)."  >>>>>>>> ".$date."<br>";
            $task = new Task();
            $task->title = request('title');
            $task->start = $date.' '.$time[0].':00:00';
            $task->end = $date.' '.$time[1].':00:00';
            $task->user_id =  auth()->user()->id;
            $task->save();
            $date = \Morilog\Jalali\jDate::forge($date)->reforge("+ $x days")->format('date');
            //echo $date."<br>";
            $date = toMilad($date);
        }
        return redirect('/');

    }
}
