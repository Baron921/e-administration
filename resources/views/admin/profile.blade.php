@extends('admin.layout.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="profile-page" id="tableProfile">
                @include('admin.single_profile')
            </div>
        </div>
    </section>

@endsection

