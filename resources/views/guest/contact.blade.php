@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Contatti</h1>
                <form action="{{ route('contact.send') }}" method="post">
                    @csrf
                    {{-- nome --}}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    {{-- email --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    {{-- messaggio --}}
                    <div class="form-group">
                        <label for="message">Messaggio</label>
                        <input type="message" name="message" id="message" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Invia">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection