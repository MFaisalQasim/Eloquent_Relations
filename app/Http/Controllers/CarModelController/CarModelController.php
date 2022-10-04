<?php

namespace App\Http\Controllers\CarModelController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $carmodel = CarModel::where('car_model', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $carmodel = CarModel::paginate($perPage);
            }

            return view('CarModel.car-model.index', compact('carmodel'));
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('CarModel.car-model.create');
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_model' => 'required'
		]);
            $requestData = $request->all();
            
            CarModel::create($requestData);
            return redirect('car-model')->with('flash_message', 'CarModel added!');
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $carmodel = CarModel::findOrFail($id);
            return view('CarModel.car-model.show', compact('carmodel'));
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $carmodel = CarModel::findOrFail($id);
            return view('CarModel.car-model.edit', compact('carmodel'));
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_model' => 'required'
		]);
            $requestData = $request->all();
            
            $carmodel = CarModel::findOrFail($id);
             $carmodel->update($requestData);

             return redirect('car-model')->with('flash_message', 'CarModel updated!');
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
        $model = str_slug('carmodel','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CarModel::destroy($id);

            return redirect('car-model')->with('flash_message', 'CarModel deleted!');
        }
        return response(view('403'), 403);

    }
}
