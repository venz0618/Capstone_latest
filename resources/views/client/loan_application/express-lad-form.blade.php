<form action="{{ url('/apply-loan') }}" method="POST" enctype="multipart/form-data" class="this-form">
    <div class="content-form-page">
        @csrf
        <div class="row">
            <div class="header-text">
                <ul>
                  <li>Please fill-out all the fillable forms below. &#40;Asterisk &#40;*&#41; indicates required field&#41;</li>
                  <li>To qualify for membership, you must be at least 18 years old.</li>
                </ul>
              </div>
              <h2 style="font-weight: 900; text-align: center; font-size: .4in; padding: 20px 0">@yield('title')</h2>
        <div class="col-lg-9 col-md-9">

            @if (Request::is('express-loan-application'))
                <input type="text" name="application_type" value="express">
            @elseif (Request::is('lad-loan-application'))
                <input type="text" name="application_type" value="lad">
            @endif

            {{-- MEMBER ID --}}
            <input required type="text" name="member" value="@auth {{ $loan->id }} @endauth">

            <div class="form-group">
                <small>Name of Member</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="name_of_member" placeholder="Enter name of member" value="@auth {{ $loan->first_name }} {{ $loan->middle_name }} {{ $loan->last_name }} @endauth">
                <small class="text-danger">@error('name_of_member') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <small>Account No.</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="account_no" placeholder="Enter account no" value="@auth {{ $loan->acc_id }} @endauth">
                <small class="text-danger">@error('account_no') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <small>Present Address</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="present_address" placeholder="Enter present_address" value="@auth {{ $loan->address }} @endauth">
                <small class="text-danger">@error('present_address') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <small>Permanent Address</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="permanent_address" placeholder="Enter permanent address" value="{{ old('permanent_address') }}">
                <small class="text-danger">@error('permanent_address') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            @if (Request::is('express-loan-application'))
                @include('client.loan_application.express_loan.express-loan-products')
            @elseif (Request::is('lad-loan-application'))
                <input required type="text" name="product_loan" value="none">
            @endif
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <small>Employer</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="employer" placeholder="Enter Employer" value="{{ old('employer') }}">
                <small class="text-danger">@error('employer') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <small>Employer Address</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="employer_address" placeholder="Enter Employer Address" value="{{ old('employer_address') }}">
                <small class="text-danger">@error('employer_address') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Date of Birth</small><span class="asterisk">*</span>
                <input class="form-control" name="date_of_birth" placeholder="Enter date of birth" type="date" value="@auth {{ date('Y-m-d', strtotime('$loan->dob')) }} @endauth">
                <small class="text-danger">@error('date_of_birth') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Age</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="age" placeholder="Enter Age" value=" @auth{{ $years }} @endauth">
                <small class="text-danger">@error('age') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Cellphone No.</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="cellphone_no" placeholder="Enter Cellphone No." value="@auth {{ $loan->contact_number }} @endauth">
                <small class="text-danger">@error('cellphone_no') {{ $message }}@enderror</small>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>TIN No.</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="tin_no" placeholder="Enter TIN No." value="@auth {{ $loan->TIN }} @endauth">
                <small class="text-danger">@error('tin_no') {{ $message }}@enderror</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Email Address</small><span class="asterisk">*</span>
                <input required type="email" class="form-control" name="email_address" placeholder="Enter Email Address" value="@auth {{ $loan->email }} @endauth">
                <small class="text-danger">@error('email_address') {{ $message }}@enderror</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Facebook Account</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="facebook_account" placeholder="Enter FB Account" value="{{ old('facebook_account') }}">
                <small class="text-danger">@error('facebook_account') {{ $message }}@enderror</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Amount Applied&#40;<small class="text-danger">Numbers only, no comma or decimals</small>&#41;</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="amount_applied" placeholder="Enter Amount Applied" value="{{ old('amount_applied') }}">
                <small class="text-danger">@error('amount_applied') {{ $message }}@enderror</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group" id="">
                <small>Term Applied&#40;<small class="text-danger">Number of months only</small>&#41;</small><span class="asterisk">*</span>
                <input required type="text" class="form-control" name="term_applied" placeholder="enter term applied" value="{{ old('term_applied') }}">
                <small class="text-danger">@error('term_applied') {{ $message }}@enderror</small>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <small>Mode of Payment</small><span class="asterisk">*</span>
                <div class="form-check row" style="padding: 3px 0;">
                    <div class="col-xs-4">
                        <input required type="radio" class="form-check-input" id="radio1" id="mode_of_payment" name="mode_of_payment" value="monthly"  @checked(old('mode_of_payment') === 'monthly')>
                        <small><label class="form-check-label" for="radio1">Monthly</label></small>
                    </div>
                    <div class="col-xs-8">
                        <input required type="radio" class="form-check-input" id="radio2" id="mode_of_payment" name="mode_of_payment" value="semi-monthly"  @checked(old('mode_of_payment') === 'semi-monthly')>
                        <small><label class="form-check-label" for="radio2">Semi-Monthly</label></small>
                    </div>
                </div>
                <small class="text-danger">@error('mode_of_payment') {{ $message }}@enderror</small>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <small>Scanned Signature</small><span class="asterisk">*</span>
                <input required type="file" class="form-control" name="scanned_signature">
                <small class="text-danger">@error('scanned_signature') {{ $message }}@enderror</small>
            </div>
        </div>
    </div>

    <div class="line"></div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            @auth
                <button class="submit_btn" type="submit">SUBMIT APPLICATION</button>
            @endauth

            @guest
                <button class="submit_btn" type="button" onclick="location.href='/login'">SUBMIT APPLICATION</button>
            @endguest
        </div>
        <div class="col-lg-4"></div>
    </div>

    </div>
</form>
