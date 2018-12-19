@extends('layouts.master')

@section('title')
    Delete Fox News!
@endsection

@section('content')

    <h3> Select your cable provider below: </h3>
    <p>  Instructions will be given on either how to delete Fox News channel from the lineup or use parental lock to block the channel </p>

    <p class='requiredText textColor'> * Required fields </p>

    <form action='/search-process' method='GET'>

        <div class="form-group">
            <label for="story">Tell us your story:</label>
            @if(count($errors) > 0)
                <textarea id="story"
                          name="story"
                          rows="5"
                          cols="33"
                          placeholder="How has Fox News ruined your relationship with loved ones?">
                          {{old('story')}}
                </textarea>

                <small id="emailHelp" class="form-text">
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </small>
            @else
                <textarea id="story"
                          name="story"
                          rows="5"
                          cols="33"
                          placeholder="How has Fox News ruined your relationship with loved ones?">
                          {{($story}}
                </textarea>
            @endif
        </div>


        <div class="form-group">
            <label for="numberSelection">Random number quantity?</label>
            <select class="form-control" name='randomNumbers' id="numberSelection">
                <option value="1" @if($randomNumbers and $randomNumbers == 1) {{ 'selected' }} @endif>1</option>
                <option value="2" @if($randomNumbers and $randomNumbers == 2) {{ 'selected' }} @endif>2</option>
                <option value="3" @if($randomNumbers and $randomNumbers == 3) {{ 'selected' }} @endif>3</option>
                <option value="4" @if($randomNumbers and $randomNumbers == 4) {{ 'selected' }} @endif>4</option>
                <option value="5" @if($randomNumbers and $randomNumbers == 5) {{ 'selected' }} @endif>5</option>
                <option value="6" @if($randomNumbers and $randomNumbers == 6) {{ 'selected' }} @endif>6</option>
                <option value="7" @if($randomNumbers and $randomNumbers == 7) {{ 'selected' }} @endif>7</option>

            </select>
        </div>

        <div class="form-group form-check">
            <input type="checkbox"
                   class="form-check-input"
                   id="odds"
                   name='showOdds' {{ ($showOdds) ? 'checked' : ''}} >
            <label class="form-check-label" for="odds">Show me my odds!</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if ($totalNumbers)
        <div class="alert alert-primary top-spacing" role="alert">
            Your amazingly lucky numbers are:
            {{ implode(', ', $lotteryList) }}
        </div>
    @endif()


    @if($showOdds)

        <div class="alert alert-warning" role="alert">
            Your odds of winning are 1 in {{$oddResults}}
        </div>

    @endif


@endsection