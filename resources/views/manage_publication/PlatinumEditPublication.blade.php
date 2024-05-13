@extends('layouts/masterPlatinum')
@section('content')

<link href="{{asset('style_manage_publication/UploadPublication.css')}}" rel="stylesheet">

<section>
  <div class="titleText"><b>Edit your research</b></div>
  <div class="required-asterisk"><b>* required</b></div>
  <div style="text-align: center; color: red;">
    @if($errors->any())
      <ul>
        @foreach($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
      </ul>
    @endif
  </div>
  <div class="container">
    <form method="post" action="{{ route('manage_publication.update', ['publication' => $publication]) }}">
      @csrf'
      @method('put')
      <div class="research-type">
        <label>
          <b>Research Type: <span style="color: red">*</span></b>
        
        </label>
        <br>
        <select id="Pb_type" name="Pb_type" style="width: 100%; padding: 6px; " >
          <option value="Article">Article</option>
          <option value="Journal">Journal</option>
          <option value="Book">Book</option>
          <option value="Conference Paper">Conference Paper</option>
        </select>
      </div>

      <br>

      <div class="publication-title">
        <label><b>Title: <span style="color: red">*</span></b></label>
        <br>
        <input type="text" name="Pb_title" placeholder="Enter your title here" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_title }}">
      </div>

      <br>

      <div class="publication-authors">
        <label><b>Authors: <span style="color: red">*</span></b></label>
        <br>
        <input type="text" name="Pb_authors" placeholder="Enter your authors here (put ',' if you have more than 1 author)" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_authors }}">
      </div>

      <br>

      <div class="publication-date">
        <label><b>Date of Publication: <span style="color: red">*</span></b></label>
        <br>
        <input type="date" name="Pb_date" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_date }}">
      </div>

      <br>

      <div class="publication-doi">
        <label><b>DOI:</b></label>
        <br>
        <input type="text" name="Pb_DOI" placeholder="Enter DOI" style="width:100%; padding: 6px 10px;" value="{{ $publication->Pb_DOI }}">
      </div>

      <br>

      <div class="publication-abstract">
        <label><b>Abstract:</b></label>
        <br>
        <textarea name="Pb_abstract" placeholder="Explain what is your article about" style="width:100%; padding: 6px 10px; height: 140px;" value="{{ $publication->Pb_abstract }}"></textarea>
      </div>

      <br>

      <div class="publication-peer">
        <label><b>Has this been peer reviewed?</b></label>
        <br>
        <select id="Pb_peer" name="Pb_peer" style="width: 20%; padding: 6px; " >
          <option value="notpeered">No</option>
          <option value="peered">Yes</option>
        </select>
      </div>

      <br>

      <div class="publication-journal">
        <label><b>Journal name:</b></label>
        <br>
        <input type="text" name="Pb_journal" placeholder="Enter journal name here" style="width:100%; padding: 6px 10px;">
      </div>
      
      <br>

      <div class="publication-journal-content">
        <div class="journal-fields">
          <div class="journal-volume">
            <label><b>Volume:</b></label>
            <input type="text" name="Pb_volume" placeholder="Enter a volume">
          </div>
          <div class="journal-issue">
            <label><b>Issue:</b></label>
            <input type="text" name="Pb_issue" placeholder="Enter an issue">
          </div>
          <div class="journal-page">
            <label><b>Page:</b></label>
            <input type="text" name="Pb_page" placeholder="Enter a page">
          </div>
        </div>
      </div>

      <br>

      <div class="publication-existing-doi">
        <label><b>Existing DOI:</b></label>
        <br>
        <input type="text" name="Pb_existingDOI" placeholder="Enter existing DOI" style="width:100%; padding: 6px 10px;">
      </div>

      <br>

      <div class="publication-refers">
        <label style="margin-bottom: 0;">
          <b>Which publication refers to?</b>
          <br>
          <p>Select your project research:</p>
        </label>
        <select id="Pb_refers" name="Pb_refers" style="width: 100%; padding: 6px; " >
          <option value="biometric">Biometric</option>
        </select>
      </div>

      <br>

      <div class="edit-button">
        <input type="submit" value="Edit">
      </div>

    </form>
  </div>
</section>

@endsection