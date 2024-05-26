@extends('layouts/masterMentor')
@section('content')

<link href="{{ asset('style_manage_publication/ListPublication.css') }}" rel="stylesheet">

<section>
  <div class="titleText"><b>List of Publications</b></div>
  <div class="success-message">
    @if(session()->has('success'))
        <div>
            {{ session('success')}}
        </div>

    @endif
  </div>

  <div class="container">
    <table>
        <tr>
            <th class="mypub-th" style="width: 10%;">No.</th>
            <th class="mypub-th" style="width: 30%;">Publication title</th>
            <th class="mypub-th" style="width: 20%;">Authors</th>
            <th class="mypub-th" style="width: 20%;">Expert</th>
            <th class="mypub-th" style="width: 20%;">Publication type</th>
            <th class="mypub-th" style="width: 30%;">Action</th>
        </tr>
        @foreach($publications as $publication)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$publication->Pb_title}}</td>
                <td>{{$publication->Pb_authors}}</td>
                <td>{{$publication->Pb_belongs}}</td>
                <td>{{$publication->Pb_type}}</td>
                <td class="action-buttons-container">
                    <a href="{{ route('manage_publication.PlatinumViewPublication', ['publication' => $publication->Pb_ID]) }}">
                        <button class="action-button">View</button>
                    </a>
                    <a href="{{ route('manage_publication.PlatinumEditPublication', ['publication' => $publication->Pb_ID]) }}">
                        <button class="action-button">Generate</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
  </div>
</section>

@endsection