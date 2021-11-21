<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::all();
        $passengers->load('car');
        return view('passengers.index', compact('passengers'));
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
            $imgPath = $request->file('avatar')->store('public/passengers');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('passenger.index'));
    }

    public function editForm($id)
    {
        $passenger = Passenger::find($id);

        if (!$passenger) {
            return redirect()->back();
        }
        $cars = Car::all();
        return view('passengers.edit', compact('passenger', 'cars'));
    }

    public function saveEdit($id, Request $request)
    {
        $model = Passenger::find($id);
        if (!$model) {
            return redirect(route('passenger.index'));
        }
        if ($request->hasFile('avatar')) {
            $oldImg = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($oldImg);

            $imgPath = $request->file('avatar')->store('public/passengers');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
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
            $imgPath = str_replace('storage/', 'public/', $model->avatar);
            Storage::delete($imgPath);
        }
        $model->delete();
        return redirect(route('passenger.index'));
    }
}
