@extends('layouts.app')

@section('title','Messages')

@section('content')
    <section>
        <div class="container  section layout_padding">
            <h1>Recieved Messages</h1>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>recieved at</th>
                </thead>
               <tbody>
                   @foreach ($messages as $message)
                   <tr>
                    <td>{{$message-> id}}</td>
                    {{-- <td><a href="/admin/messages/{{$message -> id}}">{{$message-> name}}</a></td> --}}
                    <td><a href="{{route('admin.messages.show',$message)}}">{{$message-> name}}</a></td>
                    <td>{{$message-> phone}}</td>
                    <td>{{$message-> created_at}}</td>
                </tr>
                   @endforeach
               </tbody>
            </table>
        </div>
    </section>
@endsection
