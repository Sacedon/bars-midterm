<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLog;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        return view('animals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required|string',
            'age' => 'required|integer',
        ]);

        $animal = Animal::create($request->all());
        $log_entry = Auth::user()->name . " added a animal ". $animal->name . " with the id# ". $animal->id;
        event(new UserLog($log_entry));
        return redirect()->route('animals.index')->with('success', 'Animal created successfully');
    }

    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
{
    $request->validate([
        'name' => 'required',
        'species' => 'required|string',
        'age' => 'required|integer',
    ]);

    $data = $request->only(['name', 'species', 'age']);
    $animal->update($data);

    $log_entry = Auth::user()->name . " updated a animal " . $animal->title . " with the id# " . $animal->id;
    event(new UserLog($log_entry));

    return redirect()->route('animals.index')
        ->with('success', 'animal updated successfully');
}


    public function destroy(Animal $animal)
    {
        $animal->delete();
        $log_entry = Auth::user()->name . " deleted an animal ". $animal->name . " with the id# ". $animal->id;
        event(new UserLog($log_entry));

        return redirect()->route('animals.index')
            ->with('success', 'animal deleted successfully');
    }
}
