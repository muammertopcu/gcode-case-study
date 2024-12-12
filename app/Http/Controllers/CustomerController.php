<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{

    private const DATE_FORMAT = 'd-m-Y H:i:s';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customers.index');
    }

    /**
     * Get the data for the resource.
     *
     */
    public function data(Request $request): JsonResponse|View
    {
        if (!$request->ajax()) {
            return view('customers.index');
        }

        try {
            $query = Customer::query();

            return DataTables::of($query)
                ->editColumn('created_by', function ($customer) {
                    return $customer->createdBy->name;
                })
                ->editColumn('updated_by', function ($customer) {
                    return $customer->updatedBy->name;
                })
                ->editColumn('created_at', function ($customer) {
                    return $customer->created_at->format(self::DATE_FORMAT);
                })
                ->editColumn('updated_at', function ($customer) {
                    return $customer->updated_at->format(self::DATE_FORMAT);
                })
                ->addColumn('action', function ($customer) {
                    return $this->getDatatableActions($customer);
                })
                ->make();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Get the datatable actions.
     */
    private function getDatatableActions(Customer $customer): string
    {
        $edit = route('customers.edit', ['customer' => $customer->id]);
        $destroy = route('customers.destroy', ['customer' => $customer->id]);

        return view('components.customer-actions', compact('edit', 'destroy'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            Customer::query()->create($request->validated());

            return redirect()->route('customers.index');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
