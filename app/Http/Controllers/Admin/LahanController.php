<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LahanPoint;
use App\Models\LahanPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LahanController extends Controller
{
    public function index()
    {
        $items = LahanPoint::withCount('photos')->latest('id')->paginate(12);
        return view('admin.lahan.index', compact('items'));
    }

    public function create()
    {
        return view('admin.lahan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nik' => ['nullable','string','max:50'],
            'nama_lengkap' => ['nullable','string','max:255'],
            'lat' => ['required','numeric','between:-90,90'],
            'long' => ['required','numeric','between:-180,180'],
            'photos.*' => ['nullable','image','mimes:jpeg,jpg,png','max:4096'],
        ]);

        $point = LahanPoint::create([
            'nik' => $data['nik'] ?? null,
            'nama_lengkap' => $data['nama_lengkap'] ?? null,
            'lat' => $data['lat'],
            'long' => $data['long'],
        ]);

        // handle photos
        if ($request->hasFile('photos')) {
            $order = 0;
            foreach ($request->file('photos') as $file) {
                $path = $file->store('lahan', 'public');
                $url = 'storage/' . $path;
                if ($order === 0) {
                    $point->update(['foto_path' => $url]);
                }
                LahanPhoto::create([
                    'lahan_point_id' => $point->id,
                    'path' => $url,
                    'order_index' => $order++,
                ]);
            }
        }

        return redirect()->route('admin.lahan.index')->with('success','Lahan berhasil ditambahkan');
    }

    public function edit(LahanPoint $lahan_point)
    {
        $point = $lahan_point->load('photos');
        return view('admin.lahan.edit', compact('point'));
    }

    public function update(Request $request, LahanPoint $lahan_point)
    {
        $data = $request->validate([
            'nik' => ['nullable','string','max:50'],
            'nama_lengkap' => ['nullable','string','max:255'],
            'lat' => ['required','numeric','between:-90,90'],
            'long' => ['required','numeric','between:-180,180'],
            'photos.*' => ['nullable','image','mimes:jpeg,jpg,png','max:4096'],
            'remove_photos' => ['array'],
            'remove_photos.*' => ['integer'],
        ]);

        $lahan_point->update([
            'nik' => $data['nik'] ?? null,
            'nama_lengkap' => $data['nama_lengkap'] ?? null,
            'lat' => $data['lat'],
            'long' => $data['long'],
        ]);

        // remove selected photos
        if (!empty($data['remove_photos'])) {
            $toRemove = LahanPhoto::whereIn('id', $data['remove_photos'])->get();
            foreach ($toRemove as $ph) {
                $rel = str_replace('storage/', '', $ph->path);
                Storage::disk('public')->delete($rel);
                $ph->delete();
            }
        }

        // append new photos
        if ($request->hasFile('photos')) {
            $current = (int) $lahan_point->photos()->max('order_index') + 1;
            foreach ($request->file('photos') as $file) {
                $path = $file->store('lahan', 'public');
                $url = 'storage/' . $path;
                LahanPhoto::create([
                    'lahan_point_id' => $lahan_point->id,
                    'path' => $url,
                    'order_index' => $current++,
                ]);
            }
        }

        // ensure cover foto_path is first photo if empty
        if (!$lahan_point->foto_path) {
            $first = $lahan_point->photos()->orderBy('order_index')->first();
            if ($first) {
                $lahan_point->update(['foto_path' => $first->path]);
            }
        }

        return redirect()->route('admin.lahan.index')->with('success','Lahan berhasil diperbarui');
    }

    public function destroy(LahanPoint $lahan_point)
    {
        foreach ($lahan_point->photos as $ph) {
            $rel = str_replace('storage/', '', $ph->path);
            Storage::disk('public')->delete($rel);
            $ph->delete();
        }
        $lahan_point->delete();
        return redirect()->route('admin.lahan.index')->with('success','Lahan dihapus');
    }
}


