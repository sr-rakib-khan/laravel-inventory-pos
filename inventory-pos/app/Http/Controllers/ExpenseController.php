<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function CreateExpense()
    {
        return view('frontend.expense.create');
    }

    function StoreExpense(Request $request)
    {

        $validated = $request->validate([
            'amount' => 'required',
            'date' => 'required',
        ]);


        $expense = new Expense();

        $expense->amount = $request->amount;
        $expense->date = date('d-m-Y', strtotime($request->date));
        $expense->expense_for = $request->expense_for;
        $expense->description = $request->description;

        $expense->save();

        $notification = array('message' => 'Expense Added', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


    function ExpenseList(Request $request)
    {
        $expense = '';
        if ($request->has('start_date') && $request->has('end_date') && !empty($request->start_date) && !empty($request->end_date)) {
            $start_date = date('d-m-y', strtotime($request->start_date));
            $end_date = date('d-m-y', strtotime($request->end_date));
            
            $expense =  Expense::whereBetween('date', [$start_date, $end_date])->orderBy('id', 'DESC');
        } else {
            $expense = Expense::orderBy('id', 'desc');
        }

        $result = $expense->get();

        if ($request->has('start_date') && $request->has('end_date')) {
            return response()->json($result);
        }
        return view('frontend.expense.expense_list', compact('result'));
    }

    function EditExpense($id)
    {
        $expense = Expense::find($id);

        return view('frontend.expense.edit', compact('expense'));
    }

    function UpdateExpense(Request $request)
    {
        $expense = Expense::find($request->id);

        $expense->amount = $request->amount;
        $expense->date = date('d-m-y', strtotime($request->date));
        $expense->expense_for = $request->expense_for;
        $expense->description = $request->description;

        $expense->save();

        $notification = array('message' => 'Expense Updated', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    function DeleteExpense($id)
    {
        $expense = Expense::find($id);

        $expense->delete();

        $notification = array('message' => 'Expense Deleted', 'alert-type' => 'warning');

        return redirect()->back()->with($notification);
    }
}
