<?php

namespace App\Http\Controllers\CarsController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $cars = Car::where('car_name', 'LIKE', "%$keyword%")
                ->orWhere('car_description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $cars = Car::paginate($perPage);
            }

            return view('Cars.cars.index', compact('cars'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('Cars.cars.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_name' => 'required'
		]);
            $requestData = $request->all();
            
            Car::create($requestData);
            return redirect('cars')->with('flash_message', 'Car added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $car = Car::findOrFail($id);
            return view('Cars.cars.show', compact('car'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $car = Car::findOrFail($id);
            return view('Cars.cars.edit', compact('car'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_name' => 'required'
		]);
            $requestData = $request->all();
            
            $car = Car::findOrFail($id);
             $car->update($requestData);

             return redirect('cars')->with('flash_message', 'Car updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('cars','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Car::destroy($id);

            return redirect('cars')->with('flash_message', 'Car deleted!');
        }
        return response(view('403'), 403);

    }
}
