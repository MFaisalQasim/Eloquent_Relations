<?php

namespace App\Http\Controllers\CarOwnerController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarOwner;
use Illuminate\Http\Request;

class CarOwnerController extends Controller
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $carowner = CarOwner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('des', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $carowner = CarOwner::paginate($perPage);
            }

            return view('CarOwner.car-owner.index', compact('carowner'));
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('CarOwner.car-owner.create');
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            CarOwner::create($requestData);
            return redirect('car-owner')->with('flash_message', 'CarOwner added!');
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $carowner = CarOwner::findOrFail($id);
            return view('CarOwner.car-owner.show', compact('carowner'));
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $carowner = CarOwner::findOrFail($id);
            return view('CarOwner.car-owner.edit', compact('carowner'));
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'name' => 'required'
		]);
            $requestData = $request->all();
            
            $carowner = CarOwner::findOrFail($id);
             $carowner->update($requestData);

             return redirect('car-owner')->with('flash_message', 'CarOwner updated!');
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
        $model = str_slug('carowner','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CarOwner::destroy($id);

            return redirect('car-owner')->with('flash_message', 'CarOwner deleted!');
        }
        return response(view('403'), 403);

    }
}
