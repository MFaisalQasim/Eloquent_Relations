<?php

namespace App\Http\Controllers\CarProdDateController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarProdDate;
use Illuminate\Http\Request;

class CarProdDateController extends Controller
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $carproddate = CarProdDate::where('car_model_id', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $carproddate = CarProdDate::paginate($perPage);
            }

            return view('CarProdDate.car-prod-date.index', compact('carproddate'));
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('CarProdDate.car-prod-date.create');
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_model_id' => 'required',
			'date' => 'required'
		]);
            $requestData = $request->all();
            
            CarProdDate::create($requestData);
            return redirect('car-prod-date')->with('flash_message', 'CarProdDate added!');
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $carproddate = CarProdDate::findOrFail($id);
            return view('CarProdDate.car-prod-date.show', compact('carproddate'));
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $carproddate = CarProdDate::findOrFail($id);
            return view('CarProdDate.car-prod-date.edit', compact('carproddate'));
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_model_id' => 'required',
			'date' => 'required'
		]);
            $requestData = $request->all();
            
            $carproddate = CarProdDate::findOrFail($id);
             $carproddate->update($requestData);

             return redirect('car-prod-date')->with('flash_message', 'CarProdDate updated!');
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
        $model = str_slug('carproddate','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CarProdDate::destroy($id);

            return redirect('car-prod-date')->with('flash_message', 'CarProdDate deleted!');
        }
        return response(view('403'), 403);

    }
}
