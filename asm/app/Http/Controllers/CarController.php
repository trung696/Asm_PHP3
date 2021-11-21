<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function addForm()
    {
        return view('cars.add');
    }

    public function saveAdd(Request $request)
    {
        $model = new Car();
        if ($request->hasFile('plate_image')) {
            $imgPath = $request->file('plate_image')->store('public/cars');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->plate_image = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('car.index'));
    }

    public function editForm($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return redirect()->back();
        }
        return view('cars.edit', compact('car'));
    }

    public function saveEdit($id, Request $request)
    {
        $model = Car::find($id);
        if (!$model) {
            return redirect(route('car.index'));
        }
        if ($request->hasFile('plate_image')) {
            $oldImg = str_replace('storage/', 'public/', $model->plate_image);
            Storage::delete($oldImg);

            $imgPath = $request->file('plate_image')->store('public/cars');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->plate_image = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('car.index'));
    }

    public function remove($id)
    {
        $passengers = Passenger::where('car_id', $id)->delete();
        Car::destroy($id);
        return redirect(route('car.index'));
    }
}
