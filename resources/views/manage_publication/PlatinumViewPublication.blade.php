@extends('layouts/masterPlatinum')
@section('content')

<link href="{{ asset('style_manage_publication/ViewPublication.css') }}" rel="stylesheet">

<div class="grid-container">
  <div class="grid-item item1">
    <h2 class="publication-title">{{ $publication->Pb_title }}</h2>
    <p class="publication-date">{{ (new DateTime($publication->Pb_date))->format('j F Y') }}</p>

    <div class="publication-authors">
      <b>Authors:</b><br>
      <p style="color: black;">{{ $publication->Pb_authors }}</p>
    </div>
  </div>

  <div class="grid-item item2">
    <a href="{{ Storage::url($publication->Pb_file_path) }}" download>
        <button class="download-publication"><i class="fa fa-download" aria-hidden="true"></i> Download</button>
    </a>
    <p class="publication-DOI">DOI: {{ $publication->Pb_DOI }} </p>
  </div>

  <div class="grid-item item3">
    <div class="publication-abstract-title">
      <b>Abstract:</b><br>
    </div>
    <div class="publication-abstract">
      {{ $publication->Pb_abstract }}
    </div>
  </div>

  <div class="grid-item item4">
    <div class="publication-file-show">
      @if($publication->Pb_file_path)
        <iframe src="{{ Storage::url($publication->Pb_file_path) }}" width="100%" height="600px"></iframe>
      @else
        <p>No file uploaded.</p>
      @endif
    </div>
  </div>
</div>

@endsection
