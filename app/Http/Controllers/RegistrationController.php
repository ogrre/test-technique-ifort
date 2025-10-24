<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Registration::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $query->orderBy('is_priority', 'desc')
              ->orderBy('registration_date', 'desc');

        $registrations = $query->paginate(10)->withQueryString();

        return view('registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationRequest $request)
    {
        Registration::create(array_merge($request->validated(), [
            'is_priority' => false,
        ]));

        return redirect()->route('registrations.index')
            ->with('success', 'Registration créée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Toggle priority status for a registration.
     */
    public function togglePriority(Registration $registration)
    {
        $registration->update([
            'is_priority' => !$registration->is_priority,
        ]);

        return response()->json(['success' => true]);
    }
}
