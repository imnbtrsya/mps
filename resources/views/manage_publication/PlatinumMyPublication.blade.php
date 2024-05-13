@extends('layouts/masterPlatinum')
@section('content')

<link href="{{ asset('style_manage_publication/MyPublication.css') }}" rel="stylesheet">

<section>
  <div class="titleText"><b>My publication</b></div>
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
            <th class="mypub-th" style="width: 50%;">Publication title</th>
            <th class="mypub-th" style="width: 50%;">Action</th>
        </tr>
        @foreach($publications as $publication)
            <tr>
                <td>{{$publication->Pb_ID}}</td>
                <td>{{$publication->Pb_title}}</td>
                <td class="action-buttons-container">
                    <a href="#">
                        <button class="action-button">View</button>
                    </a>
                    <a href="{{ route('manage_publication.PlatinumEditPublication', ['publication' => $publication->Pb_ID]) }}">
                        <button class="action-button">Edit</button>
                    </a>
                    <form method="post" action="{{ route('manage_publication.delete', ['publication' => $publication]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="action-button" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
  </div>
</section>
@endsection