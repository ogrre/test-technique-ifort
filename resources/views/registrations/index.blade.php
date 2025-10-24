@extends('layouts.app')

@section('title', 'Liste des Inscriptions - Psycho Praticien')

@section('content')
<div class="container">
    <header>
        <h1>Gestion des Inscriptions</h1>
        <p>Formation "Psycho Praticien"</p>
    </header>

    <div class="toolbar">
        <div class="search-bar">
            <input type="text" placeholder="Rechercher par nom ou e-mail..." id="search-input">
        </div>
        <div class="filters">
            <select name="status_filter" id="status-filter">
                <option value="">Tous les statuts</option>
                <option value="validated">Validée</option>
                <option value="pending">En attente</option>
                <option value="incomplete">Dossier incomplet</option>
                <option value="cancelled">Annulée</option>
            </select>
        </div>
        <a href="{{ route('registrations.create') }}" class="btn btn-primary">Ajouter une inscription</a>
    </div>

    <div class="listing-container">
        <table>
            <thead>
                <tr>
                    <th>Priorité</th>
                    <th>Nom du participant</th>
                    <th>Contact</th>
                    <th>Date d'inscription</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registrations as $registration)
                    <tr class="statut-{{ $registration->status }} {{ $registration->is_priority ? 'prioritaire' : '' }}">
                        <td class="priorite">
                            <button
                                class="btn-priorite {{ $registration->is_priority ? 'active' : '' }}"
                                data-id="{{ $registration->id }}"
                                title="{{ $registration->is_priority ? 'Retirer la priorité' : 'Mettre en avant' }}">
                                {{ $registration->is_priority ? '★' : '☆' }}
                            </button>
                        </td>
                        <td>{{ $registration->name }}</td>
                        <td>{{ $registration->email }}</td>
                        <td>{{ $registration->registration_date->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge">
                                @switch($registration->status)
                                    @case('validated')
                                        Validée
                                        @break
                                    @case('pending')
                                        En attente
                                        @break
                                    @case('incomplete')
                                        Dossier incomplet
                                        @break
                                    @case('cancelled')
                                        Annulée
                                        @break
                                @endswitch
                            </span>
                        </td>
                        <td class="actions">
                            <a href="#" class="btn-delete" data-id="{{ $registration->id }}">Supprimer</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Aucune inscription trouvée</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($registrations, 'links'))
        <div class="pagination-container">
            {{ $registrations->links() }}
        </div>
    @endif
</div>
@endsection

@push('scripts')
    @vite(['resources/js/registrations.js'])
@endpush
