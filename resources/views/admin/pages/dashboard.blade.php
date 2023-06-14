@extends('layouts.admin_layout')

@section('page-title',"Tableau de bord")

@section('content-title',"Tableau de bord")

@section('page-content')

<div class="row">
    <div class="col-12 col-sm-6 col-xxl-3 d-flex">
        <div class="card illustration flex-fill">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-6">
                        <div class="illustration-text p-3 m-1">
                            <h4 class="illustration-text">Bienvenue, {{ user()->firstname }} !</h4>
                            <p class="mb-0">Tableau de bord</p>
                        </div>
                    </div>
                    <div class="col-6 align-self-end text-end">
                        <img src="img/illustrations/customer-support.png" alt="Customer Support" class="img-fluid illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xxl-3 d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    {{-- <div class="flex-grow-1">
                        <h3 class="mb-2">$ 24.300</h3>
                        <p class="mb-2">Total Earnings</p>
                        <div class="mb-0">
                            <span class="badge badge-soft-success me-2"> +5.35% </span>
                            <span class="text-muted">Since last week</span>
                        </div>
                    </div> --}}
                    <div class="d-inline-block ms-3">
                        <div class="stat">
                            {{-- <i class="align-middle text-success" data-feather="dollar-sign"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="card flex-fill">
    <div class="card-header">
        <div class="card-actions float-end">
            <div class="dropdown position-relative">
                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                    <i class="align-middle" data-feather="more-horizontal"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Appel d'offre en cours</a>
                    <a class="dropdown-item" href="#">Appel d'offre publier</a>
                    <a class="dropdown-item" href="#">Appel d'offre Soumissionner</a>
                </div>
            </div>
        </div>
        <h5 class="card-title mb-0">Liste ressent des appels d'offre reçus</h5>
    </div>
    <table id="datatables-dashboard-projects" class="table table-striped my-0">
        <thead>
            <tr>
                <th>Code</th>
                <th class="d-none d-xl-table-cell">Libellé</th>
                <th class="d-none d-xl-table-cell">Date d'ouverture</th>
                <th class="d-none d-xl-table-cell">Date de clôture</th>
                <th>Status</th>
                <th class="d-none d-md-table-cell">Actions</th>
            </tr>
        </thead>
        
    </table>
</div>
    
@endsection