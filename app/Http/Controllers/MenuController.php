<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // LIST
    public function index(Request $request)
    {
        $query = Menu::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('url', 'like', '%' . $request->search . '%');
        }

        return view('admin.menus.index', [
            'menus' => $query->get()
        ]);
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.menus.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url'   => 'required|url',
            'icon'  => 'nullable|url',
        ]);

        Menu::create($request->only([
            'title',
            'url',
            'icon',
        ]));

        return redirect('/admin/menus')
            ->with('success', 'Menu berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    // UPDATE
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required',
            'url'   => 'required|url',
            'icon'  => 'nullable|url',
        ]);

        $menu->update($request->only([
            'title',
            'url',
            'icon',
        ]));

        return redirect('/admin/menus')
            ->with('success', 'Menu berhasil diupdate');
    }


    // DELETE
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()
            ->with('success', 'Menu berhasil dihapus');
    }
}
