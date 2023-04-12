<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index(Request $request): View
    {
        $data = $request->all();
        $builder = Supplier::query();
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('name', 'LIKE', "%{$data['q']}%")
                    ->orWhere('address', 'LIKE', "%{$data['q']}%")
                    ->orWhere('phone', 'LIKE', "%{$data['q']}%");
            });
        }
        $suppliers = $builder->paginate(10);

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

        return redirect()->route('admin.supplier.index')->with('success', 'New supplier has been created');
    }

    public function update(SupplierRequest $request, Supplier $supplier): RedirectResponse
    {
        $data = $request->validated();

        $supplier->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        return redirect()->route('admin.supplier.index')->with('success', 'Updated supplier successfully');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        if ($supplier->imports->isNotEmpty()) {
            return redirect()->back()->with('error', 'Supplier has import products');
        }
        $supplier->delete();

        return redirect()->route('admin.supplier.index')->with('success', 'Delete supplier successfully');
    }


}
