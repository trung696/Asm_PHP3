<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassengerController extends Controller
{
    public function index(Request $request)
    {
        $column_names = [
            'name' => 'name',
            'car_id' => 'car_id',
            'travel_time' => 'travel_time'

        ];
        $order_by = [
            'asc' => 'Tăng dần',
            'desc' => 'Giảm dần'
        ];

        $keyword = $request->has('keyword') ? $request->keyword : "";

        $rq_order_by = $request->has('order_by') ? $request->order_by : 'asc';
        $rq_column_names = $request->has('column_names') ? $request->column_names : "id";

        $query = Passenger::where('name', 'like', "%$keyword%");
        if ($rq_order_by == 'asc') {
            $query->orderBy($rq_column_names);
        } else {
            $query->orderByDesc($rq_column_names);
        }


        // $users = User::all();
        $passengers = $query->get();


        $searchData = compact('keyword');
        $searchData['order_by'] = $rq_order_by;
        $searchData['column_names'] = $rq_column_names;


        // $cars = Car::all();
        return view('passengers.index', compact('passengers', 'column_names', 'order_by', 'searchData'));
    }

    public function addForm()
    {
        $cars = Car::all();
        return view('passengers.add', compact('cars'));
    }

    public function saveAdd(Request $request)
    {
        $model = new Passenger();
        if ($request->hasFile('avatar')) {
            $imgPath = $request->file('avatar')->store('passengers');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('passenger.index'));
    }

    public function editForm($id)
    {
        $passenger = Passenger::find($id);

        $year = substr($passenger->travel_time, 0, 4);
        $month = substr($passenger->travel_time, 5, 2);
        $day = substr($passenger->travel_time, 8, 2);
        $hour = substr($passenger->travel_time, 11, 2);
        $minute = substr($passenger->travel_time, 14, 2);

        if (!$passenger) {
            return redirect()->back();
        }
        $cars = Car::all();
        return view('passengers.edit', compact('passenger', 'cars', 'year', 'month', 'day', 'hour', 'minute'));
    }

    public function saveEdit($id, Request $request)
    {
        $model = Passenger::find($id);
        if (!$model) {
            return redirect(route('passenger.index'));
        }
        if ($request->hasFile('avatar')) {
            // $oldImg = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($model->avatar);

            $imgPath = $request->file('avatar')->store('passengers');
            $imgPath = str_replace('public/', '', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('passenger.index'));
    }

    public function remove($id)
    {
        $model = Passenger::find($id);
        if (!empty($model->avatar)) {
            // $imgPath = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($model->avatar);
        }
        $model->delete();
        return redirect(route('passenger.index'));
    }
}
