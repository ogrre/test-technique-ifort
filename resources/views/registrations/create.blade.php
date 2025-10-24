@extends('layouts.app')

@section('title', 'Nouvelle Inscription - Psycho Praticien')

@section('content')
<div class="container">
    <header>
        <h1>Nouvelle Inscription</h1>
        <p>Ajouter un nouveau participant à la formation "Psycho Praticien".</p>
    </header>

    @if ($errors->any())
        <div class="alert alert-error" style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registrations.store') }}" method="POST" class="inscription-form">
        @csrf

        <div class="form-group">
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" placeholder="Ex: Jean Dupont" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" placeholder="Ex: jean.dupont@email.com" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" placeholder="Ex: 06 12 34 56 78" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label for="registration_date">Date d'inscription</label>
            <input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date', date('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Statut de l'inscription</label>
            <select id="status" name="status">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>En attente de paiement</option>
                <option value="validated" {{ old('status') == 'validated' ? 'selected' : '' }}>Validée</option>
                <option value="incomplete" {{ old('status') == 'incomplete' ? 'selected' : '' }}>Dossier incomplet</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Annulée</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer l'inscription</button>
            <a href="{{ route('registrations.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection
