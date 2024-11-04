<?php

namespace App\Http\Controllers;

use App\Models\StorageSpot;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductSpecificationController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function ProductSpecificationCreate()
    {
        $warehouse = Warehouse::all();
        $unit = Unit::all();
        $spot = StorageSpot::all();

        return view('frontend.product_specification.create', compact('warehouse', 'unit', 'spot'));
    }

    function WarehouseAdd(Request $request)
    {
        $validated = $request->validate([
            'warehouse' => 'required',
        ]);

        $warehouse = new Warehouse();
        $warehouse->warehouse_name = $request->warehouse;
        $warehouse->status = $request->status;
        $warehouse->save();

        $notification = array('message' => 'Warehouse Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function EditWarehouse($id)
    {
        $warehouse = Warehouse::where('id', $id)->first();
        return view('frontend.product_specification.warehouse_edit', compact('warehouse'));
    }


    function UpdateWarehouse(Request $request)
    {

        $warehouse = Warehouse::find($request->id);
        $warehouse->warehouse_name = $request->warehouse;
        $warehouse->status = $request->status;
        $warehouse->save();

        $notification = array('message' => 'Warehouse Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function WarehouseDelete($id)
    {
        $warehouse = Warehouse::find($id);

        $warehouse->delete();

        $notification = array('message' => 'Warehouse Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }


    //add unit method
    function AddUnit(Request $request)
    {
        $validated = $request->validate([
            'unit' => 'required',
        ]);

        $unit = new Unit();
        $unit->unit = $request->unit;
        $unit->status = $request->status;

        $unit->save();

        $notification = array('message' => 'Unit Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    // unit edit method 
    function EditUnit($id)
    {
        $unit = Unit::find($id);

        return view('frontend.product_specification.unit_edit', compact('unit'));
    }

    // unit update method 
    function UnitUpdate(Request $request)
    {
        $unit = Unit::find($request->id);

        $unit->unit = $request->unit;
        $unit->status = $request->status;

        $unit->save();


        $notification = array('message' => 'Unit Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    //unit delete method
    function DeleteUnit($id)
    {
        $unit = Unit::find($id);
        $unit->delete();

        $notification = array('message' => 'Unit Delete', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }


    // storage spot add method 
    function AddStorageSpot(Request $request)
    {
        $spot = new StorageSpot();
        $spot->spot = $request->spot;
        $spot->status = $request->status;

        $spot->save();

        $notification = array('message' => 'Storage Spot Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    //storage spot edit mehtod

    function EditStorageSpot($id)
    {
        $spot = StorageSpot::find($id);

        return view('frontend.product_specification.spot_edit', compact('spot'));
    }


    // spot update mehtod 
    function UpdateStorageSpot(Request $request)
    {
        $spot = StorageSpot::find($request->id);

        $spot->spot = $request->spot;
        $spot->status = $request->status;

        $spot->save();

        $notification = array('message' => 'Storage Spot Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    //spot delete method 
    function DeleteStorageSpot($id)
    {
        $spot = StorageSpot::find($id);

        $spot->delete();

        $notification = array('message' => 'Storage Spot Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
