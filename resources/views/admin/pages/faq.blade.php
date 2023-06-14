@extends('layouts.admin_layout')

@section('page-title', 'Foire Aux Questions (FAQ)')

@section('content-title', 'Foire Aux Questions (FAQ)')

@section('page-content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header pb-0">
            <h5 class="card-title">Formulaire de création d'une FAQ</h5>
            {{-- <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6> --}}
        </div>
        <div class="card-body">
            @if (isset($faq))
            <form id="" method="post" action="{{ route('faq.update', $faq->id) }}">
                @method('patch')
                @else
                <form id="" method="post" action="{{ route('faq.store') }}">
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" for="id-question">Question</label>
                            <textarea id="id-question" name="question" rows="2" class="form-control @error('question') is-invalid @enderror">@if (isset($faq)) {!! $faq->question !!} @else {!! old('question') !!} @endif</textarea>
                            @error('question')
                            <span class="invalid-feedback text-danger mb-5" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="id-response">Réponse</label>
                            {{-- <textarea id="id-response" name="response" rows="2" class="form-control @error('response') is-invalid @enderror">{!! old('response',$faq->response) !!}</textarea> --}}
                            <textarea id="id-response" name="response" rows="2" class="form-control @error('response') is-invalid @enderror">@if (isset($faq)) {!! $faq->response !!} @else {!! old('response') !!} @endif</textarea>
                            @error('response')
                            <span class="invalid-feedback text-danger" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="float-end mt-3">
                        <button type="submit" id="btn-save" class="btn btn-sm btn-outline-success">{{ isset($faq) ? 'Modifier' : 'Enregistrer' }}</button>
                        {{-- <button type="reset" class="btn btn-sm btn-outline-dark">Fermer</button> --}}
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Liste des questions fréquemment posées</h5>
            </div>
            <div class="card-body">
                <table id="id-faq-datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle col-1">N°</th>
                            <th class="text-center align-middle col-5">Question</th>
                            <th class="text-center align-middle col-5">Réponse</th>
                            <th class="text-center align-middle col-1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($faqs) && sizeof($faqs) > 0)
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($faqs as $faq)
                        <tr class="align-middle">
                            <td class="text-center align-middle">{{ $i++ }}</td>
                            <td class="text-center align-middle">{!! $faq->question !!}</td>
                            <td class="text-center align-middle">{!! $faq->response !!}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('faq.index', $faq->id) }}"><i class="fa fa-edit text-primary" title="Modification"></i></a>
                                <a href="{{ route('faq.destroy', $faq->id) }}"><i class="fa fa-trash-alt text-danger ms-2" title="Suppression"></i></a>
                                {{-- {!! faqDelBtnStatus($faq->id) !!} --}}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Datatables Responsive
        $("#id-faq-datatable").DataTable({
            responsive: true
            , language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
            , }
        , });
    });

</script>

<script>
    $(document).ready(function() {
        $('#id-question').summernote({
            placeholder: "Saisissez la question dans cette zone...",
            // required,
            height: 150
        });
        $('#id-response').summernote({
            placeholder: "Saisissez la réponse dans cette zone...",
            // required,
            height: 150
        });
    });

</script>
@endsection
