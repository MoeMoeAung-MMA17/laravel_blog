@extends('layouts.master')

@section('content')
    <h3>Validation Practice</h3>
    <hr>
    <form action="{{ route("validateCheck") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class=" form-label" for="">Article Title</label>
            <input type="text" value="{{ old('title') }}" class=" form-control @error('title') is-invalid @enderror" name="title">
            @error('title')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @php
            $genders = ['male','female','others'];
            // $townships = ['Bahan','Sanchaung','Tamwe','Thamine',"Hlaing"];
        @endphp
        <div class="mb-3">
            <label for="" class="form-label">Gender</label>
            @foreach ($genders as $gender)
            <div class="form-check @error('gender') is-invalid @enderror">
                <input class="form-check-input"  
                    name="gender" type="radio" 
                    value="{{ $gender }}"
                    {{ old('gender') === $gender ? 'checked' : '' }}
                    id="gender_{{ $gender }}">
                <label class="form-check-label" for="gender_{{ $gender }}">
                {{ $gender }}
                </label>
        </div>
        @endforeach

        @error('gender')
        <div class=" invalid-feedback">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class=" form-label" for="">Select Township</label>
            <select class="form-select @error('township') is-invalid @enderror" name="township" id="township">
                <option value="">Select One</option>
                @foreach (App\Models\Township::all() as $township)
                    <option value="{{ $township->name }}"
                    {{ old('township') === $township->name ? 'selected' : '' }}
                    >{{ $township->name }}</option>
                @endforeach
            </select>
            @error('township')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for=" " class="form-label">Select Your Skills</label>
            @foreach (App\Models\Skill::all() as $skill)
            <div class="form-check">
                <input class="form-check-input"
                    name="skills[]"
                    type="checkbox" value="{{ $skill->title }}"
                    id="skill_{{ $skill->title }}"
                    {{ in_array($skill->title,old('skills',[])) ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="skill_{{ $skill->title }}">
                    {{ $skill->title }}
                </label>
            </div>            
            @endforeach
            @error('skills')
                <div class=" small text-danger">{{ $message }}</div>
            @enderror
            @error('skills.*')
                <div class=" small text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label class=" form-label" for="">Photo Upload</label>
            <input type="file" class=" form-control @error('photo') is-invalid @enderror" 
            name="photo">
            @error('photo')
                <div class=" invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label class=" form-label" for="">Certificate Attachment</label>
            <input type="file" class=" form-control " 
            name="certificates[]" multiple>
            @error('certificates')
                <div class=" small text-danger">{{ $message }}</div>
            @enderror
            @error('certificates.*')
                <div class=" small text-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>

        <button class=" btn btn-primary">Save Article</button>
    </form>
               
@endsection