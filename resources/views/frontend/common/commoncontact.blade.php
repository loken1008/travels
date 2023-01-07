<form class="mt-4" method="post" action="{{ route('user.message') }}">
    @csrf
    <div class="contact-form form-row">
        <div class="form-group col-md-12">
            @if (Auth()->guard('customer')->check() &&
                Auth()->guard('customer')->user()->first_name && Auth()->guard('customer')->user()->last_name)
                <input type="text" name="f_name" id="f_name" class="form-control"
                    value="{{ Auth()->guard('customer')->user()->first_name }} {{ Auth()->guard('customer')->user()->last_name }}" readonly>
            @else
                <input type="text" name="f_name" id="f_name" class="form-control"
                    placeholder="Full Name" required>
            @endif
            @error('f_name')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="l_name" value="mountaintour">
        <div class="form-group col-md-12">
            @if (Auth()->guard('customer')->check() &&
                Auth()->guard('customer')->user()->email)
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ Auth()->guard('customer')->user()->email }}" readonly > 
            @else
                <input type="email" name="email" id="email" class="form-control"
                    placeholder="Your Email" required >
            @endif
            @error('email')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            @if (Auth()->guard('customer')->check() &&
                Auth()->guard('customer')->user()->mobile)
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ Auth()->guard('customer')->user()->mobile }}" readonly >
            @else
                <input type="number" name="phone" id="phone" class="form-control"
                    placeholder="Your Contact Number" required >
            @endif
            @error('phone')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            @if (Auth()->guard('customer')->check() &&
                Auth()->guard('customer')->user()->country)
                <input type="text" name="country" id="country" class="form-control"
                    value="{{ Auth()->guard('customer')->user()->country }}" readonly>
            @else
                <input type="text" name="country" class="form-control" placeholder="Country"
                    id="country" required>
            @endif
            @error('country')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group col-md-12">
            <textarea class="form-control" rows="6" placeholder="Write Message" id="message" name="message" required></textarea>
        </div>
        <div class="form-group col-md-12">
           
                <div class="mt-4 recaptch">

                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    {{-- @error('g-recaptcha-response')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}
                </div>
                <button class="loginbtn mt-4 mb-4" type="submit" value="Submit Form">Send
                    Message</button>
        </div>

        <div id="form-messages"></div>
    </div>
</form>