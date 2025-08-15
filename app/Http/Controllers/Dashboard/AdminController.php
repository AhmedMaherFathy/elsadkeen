<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminStoreRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        // return response()->json($admins);
        return view('dashboard.admins.index', compact('admins'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.admins.create', compact('permissions'));
    }

    public function store(AdminStoreRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('admins', 'public');
            $data['image'] = $imagePath;
        }

        // Create admin
        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $data['image'] ?? null,
        ]);

        // Assign permissions
        if (isset($data['permissions'])) {
            $admin->syncPermissions($data['permissions']);
        }

        return redirect()->route('dashboard.admin.index')->with('success', 'Admin created successfully.');
    }

    public function show($id)
    {
        $admin = Admin::with('permissions')->findOrFail($id);
        return view('dashboard.admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        $permissions = Permission::all();
        return view('dashboard.admins.edit',compact(['admin','permissions']));
    }

    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        $data = $request->validated();
        // return $admin;
        // Handle image upload
        if ($request->hasFile('image') ) {
            // return $data;
            if ($admin->image && Storage::disk('public')->exists($admin->image)) {
                Storage::disk('public')->delete($admin->image);
            }

            $imagePath = $request->file('image')->store('admins', 'public');
            $data['image'] = $imagePath;
        }

        // info($admin->getRawOriginal('image'));
        $admin->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $data['image'] ?? $admin->getRawOriginal('image'),
            'password' => isset($data['password']) ? Hash::make($data['password']) : $admin->password,
        ]);

        // Update permissions
        $admin->syncPermissions($data['permissions'] ?? []);

        return redirect()->route('dashboard.admin.index')->with('success', 'تم تحديث بيانات المشرف بنجاح.');
    }


    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // Detach permissions (for many-to-many)
        $admin->permissions()->detach();

        // Delete image if exists
        if ($admin->image && Storage::disk('public')->exists('admins/' . $admin->image)) {
            Storage::disk('public')->delete('admins/' . $admin->image);
        }

        $admin->delete();

        return redirect()->route('dashboard.admin.index')
            ->with('success', 'تم حذف المشرف وجميع البيانات المرتبطة به بنجاح.');
    }
}
