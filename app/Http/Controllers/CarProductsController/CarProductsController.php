<?php

namespace App\Http\Controllers\CarProductsController;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\CarProduct;
use Illuminate\Http\Request;

class CarProductsController extends Controller
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $carproducts = CarProduct::where('car_id', 'LIKE', "%$keyword%")
                ->orWhere('product_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $carproducts = CarProduct::paginate($perPage);
            }

            return view('CarProducts.car-products.index', compact('carproducts'));
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('CarProducts.car-products.create');
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_id' => 'required',
			'product_id' => 'required'
		]);
            $requestData = $request->all();
            
            CarProduct::create($requestData);
            return redirect('car-products')->with('flash_message', 'CarProduct added!');
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $carproduct = CarProduct::findOrFail($id);
            return view('CarProducts.car-products.show', compact('carproduct'));
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $carproduct = CarProduct::findOrFail($id);
            return view('CarProducts.car-products.edit', compact('carproduct'));
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'car_id' => 'required',
			'product_id' => 'required'
		]);
            $requestData = $request->all();
            
            $carproduct = CarProduct::findOrFail($id);
             $carproduct->update($requestData);

             return redirect('car-products')->with('flash_message', 'CarProduct updated!');
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
        $model = str_slug('carproducts','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            CarProduct::destroy($id);

            return redirect('car-products')->with('flash_message', 'CarProduct deleted!');
        }
        return response(view('403'), 403);

    }
}
