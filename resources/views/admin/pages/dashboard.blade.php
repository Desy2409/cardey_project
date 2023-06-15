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
    
</div>
    
@endsection