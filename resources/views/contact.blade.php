@extends('layouts.app')

@section('content')     

     @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <!-- Contact form -->
        <form id="contact" method="POST" action="{{ route('contact.store') }}">

            @csrf
            <h3>ENQUIRY FORM</h3>
            
            <fieldset>
                <input type="text" placeholder="Your Name" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" required>

                <!-- Error -->
                @if ($errors->has('name'))
                    <div class="error">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </fieldset>
            <fieldset>
              <input type="email" placeholder="Your Email Address" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" required>

                @if ($errors->has('email'))
                    <div class="error">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </fieldset>
            <fieldset>
              <input type="numer" placeholder="Your Phone Number" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" name="phone" required>

                @if ($errors->has('phone'))
                    <div class="error">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </fieldset>
            <fieldset>
              <input type="text" placeholder="Subject" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject" required>

                @if ($errors->has('subject'))
                    <div class="error">
                        {{ $errors->first('subject') }}
                    </div>
                @endif
            </fieldset>
            <fieldset>
               <textarea placeholder="Type your message here...." class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" rows="4" required></textarea>

                @if ($errors->has('message'))
                    <div class="error">
                        {{ $errors->first('message') }}
                    </div>
                @endif
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </fieldset>
            
    </form>
@endsection
@push('style')
<style type="text/css">
    
</style>
@endpush
@push('scripts')
<script type="text/javascript">
    
</script>

@endpush        