<?php

namespace App\Http\Controllers\CarEngineController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarEngine;
use Illuminate\Http\Request;

class CarEngineController extends Controller
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $carengine = CarEngine::where('name', 'LIKE', "%$keyword%")
                ->orWhere('engine_model', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $carengine = CarEngine::paginate($perPage);
            }

            return view('CarEngine.car-engine.index', compact('carengine'));
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('CarEngine.car-engine.create');
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'engine_model' => 'required'
		]);
            $requestData = $request->all();
            
            CarEngine::create($requestData);
            return redirect('car-engine')->with('flash_message', 'CarEngine added!');
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $carengine = CarEngine::findOrFail($id);
            return view('CarEngine.car-engine.show', compact('carengine'));
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $carengine = CarEngine::findOrFail($id);
            return view('CarEngine.car-engine.edit', compact('carengine'));
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required',
			'engine_model' => 'required'
		]);
            $requestData = $request->all();
            
            $carengine = CarEngine::findOrFail($id);
             $carengine->update($requestData);

             return redirect('car-engine')->with('flash_message', 'CarEngine updated!');
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
        $model = str_slug('carengine','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CarEngine::destroy($id);

            return redirect('car-engine')->with('flash_message', 'CarEngine deleted!');
        }
        return response(view('403'), 403);

    }
}
