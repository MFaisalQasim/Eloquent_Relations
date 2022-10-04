<?php

namespace App\Http\Controllers\CarHeadquaterController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarHeadquater;
use Illuminate\Http\Request;

class CarHeadquaterController extends Controller
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $carheadquater = CarHeadquater::where('name', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $carheadquater = CarHeadquater::paginate($perPage);
            }

            return view('CarHeadquater.car-headquater.index', compact('carheadquater'));
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('CarHeadquater.car-headquater.create');
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            CarHeadquater::create($requestData);
            return redirect('car-headquater')->with('flash_message', 'CarHeadquater added!');
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $carheadquater = CarHeadquater::findOrFail($id);
            return view('CarHeadquater.car-headquater.show', compact('carheadquater'));
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $carheadquater = CarHeadquater::findOrFail($id);
            return view('CarHeadquater.car-headquater.edit', compact('carheadquater'));
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $carheadquater = CarHeadquater::findOrFail($id);
             $carheadquater->update($requestData);

             return redirect('car-headquater')->with('flash_message', 'CarHeadquater updated!');
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
        $model = str_slug('carheadquater','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CarHeadquater::destroy($id);

            return redirect('car-headquater')->with('flash_message', 'CarHeadquater deleted!');
        }
        return response(view('403'), 403);

    }
}
