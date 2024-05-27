@extends('layouts/masterPlatinum')
@section('content')

<style>
    section {
    position: relative;
    min-height: 100px; 
    }

    .titleText {
        text-align: center;
        font-size: 30px;
        padding-top: 1rem;
    }

    .success-message {
        text-align: center;
        color: green;
        padding-bottom: 20px;
    }

    .container {
        border: 1px solid grey;
        background-color: #F9F9F9;
        max-width: 1000px;
        width: 100%;
        padding: 20px 50px;
        display: flex;
        flex-direction: column; 
        margin: auto;
        margin-bottom: 1rem;
    }

    th, td{
        text-align: center;
        height: 40px;
    }

    .myexp-th {
        padding-bottom: 12px;
        font-size: 17px;
    }


    .action-button {
        border: 2px solid rgba(255, 255, 255, 0.733);
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        width: 100px;
        margin: 0px 7px;
        padding: 3px 0px;
        color: white;
        background-color: black;
        border-radius: 10px;
    }

    .action-button:hover {
        background-color: grey;
    }

    .action-buttons-container {
        display: flex;
        justify-content: center;
        align-items: center; 
    }

</style>

<section>
  <div class="titleText"><b>My Expert List</b></div>
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
            <th class="myexp-th" style="width: 10%;">No.</th>
            <th class="myexp-th" style="width: 50%;">My Expert</th>
            <th class="myexp-th" style="width: 50%;">Action</th>
        </tr>
        @foreach($expertdomain as $expertdomain)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$expertdomain->E_Name}}</td>
                <td class="action-buttons-container">
                    <a href="{{ route('manage_expertdomain.ViewExpert', ['expertdomain' => $expertdomain->E_ID]) }}">
                        <button class="action-button">View</button>
                    </a>
                    <a href="{{ route('manage_expertdomain.EditExpert', ['expertdomain' => $expertdomain->E_ID]) }}">
                        <button class="action-button">Edit</button>
                    </a>
                    <form id="deleteForm_{{ $expertdomain->id }}" method="post" action="{{ route('manage_expertdomain.delete', ['expertdomain' => $expertdomain]) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="action-button" value="Delete" onclick="return confirmDelete({{ $expertdomain->id }})">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
  </div>
</section>

@endsection