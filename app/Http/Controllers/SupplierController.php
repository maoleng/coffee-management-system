<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{

    public function index(): View
    {
        $suppliers = Supplier::query()->paginate(10);

        return view('admin.supplier.index', [
            'suppliers' => $suppliers,
        ]);
    }

    public function create(): View
    {
        return view('admin.supplier.create');
    }

    public function edit(Supplier $supplier): View
    {
        return view('admin.supplier.edit', [
            'supplier' => $supplier,
        ]);
    }

    public function store(SupplierRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Supplier::query()->create([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        return redirect()->route('admin.supplier.index');
    }

    public function update(SupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $data = $request->all();

        $supplier->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        return redirect()->route('admin.supplier.index');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();

        return redirect()->route('admin.supplier.index');
    }


}
