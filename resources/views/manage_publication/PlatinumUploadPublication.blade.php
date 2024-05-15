@extends('layouts/masterPlatinum')
@section('content')

<link href="{{asset('style_manage_publication/UploadPublication.css')}}" rel="stylesheet">

<section>
  <div class="titleText"><b>Add your research</b></div>
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
    <form method="post" action="{{route('manage_publication.store')}}" enctype="multipart/form-data">
      @csrf'
      @method('post')
      <div class="research-type">
        <label><b>Research Type: <span style="color: red">*</span></b></label>
        <br>
        <select id="Pb_type" name="Pb_type" style="width: 100%; padding: 6px; " >
          <option value="Article">Article</option>
          <option value="Journal">Journal</option>
          <option value="Book">Book</option>
          <option value="Conference Paper">Conference Paper</option>
        </select>
      </div>

      <br>

      <div class="upload-paper">
        <label for="Pb_file_input"><b>Add a file: <span style="color: red">*</span></b></label>
        <br>
        <input type="file" id="Pb_file_input" name="Pb_file" style="display: none;" onchange="updateFileName(this)">
        <button type="button" class="upload-button" onclick="document.getElementById('Pb_file_input').click()">Upload</button>
        <p id="file_name"></p> <!-- Display file name here -->
      </div>
      
      <br>

      <div class="publication-belongs">
        <label><b>Is this publication belongs to expert? <span style="color: red">*</span></b></label>
        <br>
        <select id="Pb_belongs" name="Pb_belongs" style="width: 30%; padding: 6px; " >
          <option value="myself">No, myself</option>
          <option value="expert">Yes</option>
        </select>
      </div>

      <br>

      <div class="publication-title">
        <label><b>Title: <span style="color: red">*</span></b></label>
        <br>
        <input type="text" name="Pb_title" placeholder="Enter your title here" style="width:100%; padding: 6px 10px;">
      </div>

      <br>

      <div class="publication-authors">
        <label><b>Authors: <span style="color: red">*</span></b></label>
        <br>
        <input type="text" name="Pb_authors" placeholder="Enter your authors here (put ',' if you have more than 1 author)" style="width:100%; padding: 6px 10px;">
      </div>

      <br>

      <div class="publication-date">
        <label><b>Date of Publication: <span style="color: red">*</span></b></label>
        <br>
        <input type="date" name="Pb_date" style="width:100%; padding: 6px 10px;">
      </div>

      <br>

      <div class="publication-doi">
        <label><b>DOI:</b></label>
        <br>
        <input type="text" name="Pb_DOI" placeholder="Enter DOI" style="width:100%; padding: 6px 10px;">
      </div>

      <br>

      <div class="publication-abstract">
        <label><b>Abstract:</b></label>
        <br>
        <textarea name="Pb_abstract" placeholder="Explain what is your article about" style="width:100%; padding: 6px 10px; height: 140px;"></textarea>
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
          <b>Which publication refers to? <span style="color: red">*</span></b>
          <br>
          <p>Select your project research:</p>
        </label>
        <select id="Pb_refers" name="Pb_refers" style="width: 100%; padding: 6px; " >
          <option value="biometric">Biometric</option>
        </select>
      </div>

      <br>

      <div class="agreement-box">
          <input type="checkbox" id="agreement" name="agreement" value="agreement">
          <label for="agreement" style="margin-bottom: 0;">I have reviewed and verified each file I am uploading. I have the right to share each file publicly, and agree to the Upload Conditions <span style="color: red">*</span></label>
      </div>

      <br>

      <div class="submit-button">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</section>

@endsection