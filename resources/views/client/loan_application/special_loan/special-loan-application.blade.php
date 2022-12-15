@extends('client.layout.index2')
@section('title', 'Special Loan Application Form')
@section('client_content')

<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="mem-bg">
        <form action="{{ url('/special-loan-application') }}" method="POST" enctype="multipart/form-data" class="this-form">
            <div class="content-form-page">
                @csrf
                <div class="header-text">
                    <ul>
                        <li>Please fill-out all the fillable forms below. &#40;Asterisk &#40;*&#41; indicates required field&#41;</li>
                        <li>To qualify for membership, you must be at least 18 years old.</li>
                    </ul>
                </div>
                <h2 style="font-weight: 900; text-align: center; font-size: .4in; padding: 20px 0">@yield('title')</h2>
                <div class="row">

                    <div class="personal-info-text">
                        <h3>Personal Information</h3>
                        </div>
                        <div class="line"></div>
                        <div class="col-lg-4">

                                <input type="hidden" name="application_type" value="special">

                            {{-- USER ID --}}
                    <input required type="hidden" name="member" value="@auth {{ auth()->user()->id }} @endauth">

                            <div class="form-group">
                                <small>Name of Member</small>
                                <input type="text" name="name_of_member" class="form-control" placeholder="ENTER NAME OF MEMBER" value="@auth {{ $loan->first_name }} {{ $loan->middle_name }} {{ $loan->last_name }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Age</small>
                                <input required type="text" name="age" class="form-control" placeholder="ENTER AGE" value="@auth {{ $years }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Date of Birth</small>
                                <input required type="text" name="date_of_birth" class="form-control" placeholder="ENTER DATE OF BIRTH" value="@auth {{ $loan->dob }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Present Address</small>
                                <input required type="text" name="present_address" class="form-control" placeholder="ENTER PRESENT ADDRESS" value="@auth {{ $loan->address }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Permanent Address</small>
                                <input required type="text" name="permanent_address" class="form-control" placeholder="ENTER PERMANENT ADDRESS">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Email Address</small>
                                <input required type="text" name="email_address" class="form-control" placeholder="ENTER EMAIL ADDRESS" value="@auth {{ $loan->email }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Facbook Account</small>
                                <input required type="text" name="fb_account" class="form-control" placeholder="ENTER FACEBOOK ACCOUNT">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Cellphone No.</small>
                                <input required type="text" name="cell_num" class="form-control" placeholder="ENTER CELLPHONE NO." value="@auth {{ $loan->contact_number }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>SSS Number</small>
                                <input required type="text" name="sss_num" class="form-control" placeholder="ENTER SSS NUMBER" value="@auth {{ $loan->SSSnum }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>CASALCO ID No.</small>
                                <input required type="text" name="casalco_num" class="form-control" placeholder="ENTER CASALCO ID NO." value="@auth {{ $loan->acc_id }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>TIN Number</small>
                                <input required type="text" name="tin_num" class="form-control" placeholder="ENTER TIN NUMBER" value="@auth {{ $loan->TIN }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Civil Status</small>
                                <input required type="text" name="civil_status" class="form-control" placeholder="ENTER CIVIL STATUS" value="@auth {{ $loan->civilStatus }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>No. of children</small>
                                <input required type="text" name="children_num" class="form-control" placeholder="ENTER NO. OF CHILDREN" value="@auth {{ $loan->Dependents }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Employer</small>
                                <input required type="text" name="employer" class="form-control" placeholder="ENTER EMPLOYER">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Length of service</small>
                                <input type="text" name="length_of_service" class="form-control" placeholder="ENTER LENGTH OF SERVICE">
                                <small class="text-danger">@error('length_of_service') {{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Employment Status</small>
                                <input type="text" name="employment_status" class="form-control" placeholder="ENTER CURRENT EMPLOYMENT STATUS">
                                <small class="text-danger">@error('employment_status') {{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Present Position</small>
                                <input type="text" name="present_position" class="form-control" placeholder="ENTER PRESENT POSITION (IF APPLICABLE)">
                                <small class="text-danger">@error('present_position') {{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Name of Spouse</small>
                                <input required type="text" name="spouse_name" class="form-control"  placeholder="ENTER SPOUSE NAME" value="@auth {{ empty($loan->spouse_name) ? 'NONE' : $loan->spouse_name  }} @endauth">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <small>Occupation</small>
                                <input required type="text" name="occupation" class="form-control" placeholder="ENTER CURRENT OCCUPATION" value="@auth {{ $loan->Occu }} @endauth">
                            </div>
                        </div>

                </div>

                <div class="row">
                    <div class="personal-info-text">
                        <h3>Credit Assessment List</h3>
                    </div>
                    <div class="line"></div>

                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Borrower Income</small>
                                <input type="text" name="borrower_income" class="form-control" placeholder="ENTER THE BORROWER INCOME">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Other Income</small>
                                <input type="text" name="other_income" class="form-control" placeholder="ENTER OTHER INCOME">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Spouse Income</small>
                                <input type="text" name="spouse_income" class="form-control" placeholder="ENTER SPOUSE INCOME">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Types of Loan Applied</small>
                                <select name="product_loan" id="" class="form-control">
                                    <option value="" disabled selected>Select Product Loan</option>
                                    <option value="midyear & christmas loan">Midyear & Christmas Loan</option>
                                    <option value="multi-purpose loan">MUlti-purpose Loan</option>
                                    <option value="previlige loan">Previlige Loan</option>
                                    <option value="medical loan">Medical Loan</option>
                                    <option value="travel loan">Travel Loan</option>
                                    <option value="instant loan">Instant Loan</option>
                                    <option value="car loan">Car Loan</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Amount Applied</small>
                                <input type="text" name="amount_applied" class="form-control" placeholder="ENTER AMOUNT APPLIED">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Term Applied</small>
                                <input type="text" name="term_applied" class="form-control" placeholder="ENTER TERM APPLIED">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <small>Mode of Payment</small><span class="asterisk">*</span>
                                <div class="form-check row" style="padding: 3px 0;">
                                    <div class="col-xs-4">
                                        <input type="radio" class="form-check-input" id="radio1" id="mode_of_payment" name="mode_of_payment" value="monthly"  @checked(old('mode_of_payment') === 'monthly')>
                                        <small><label class="form-check-label" for="radio1">Monthly</label></small>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="radio" class="form-check-input" id="radio2" id="mode_of_payment" name="mode_of_payment" value="semi-monthly"  @checked(old('mode_of_payment') === 'semi-monthly')>
                                        <small><label class="form-check-label" for="radio2">Semi-Monthly</label></small>
                                    </div>
                                </div>
                                <small class="text-danger">@error('mode_of_payment') {{ $message }}@enderror</small>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Co-maker History</small>
                                <input type="text" name="co_history" class="form-control" placeholder="ENTER CO-MAKER HISTORY">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Name of Co-maker</small>
                                <input type="text" name="co_name" class="form-control" placeholder="ENTER NAME OF CO-MAKER">
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Food & Subsistence</small>
                                <input type="text" name="food" class="form-control" placeholder="ENTER AMOUNT FOR FOOD AND SUBSISTENCE">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Education Bill</small>
                                <input type="text" name="education_bill" class="form-control" placeholder="ENTER AMOUNT FOR EDUCATION">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Electric Bill</small>
                                <input type="text" name="electric_bill" class="form-control" placeholder="ENTER AMOUNT FOR ELECTRICITY">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Water Bill</small>
                                <input type="text" name="water_bill" class="form-control" placeholder="ENTER AMOUNT FOR WATER">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Transportation</small>
                                <input type="text" name="transportation" class="form-control" placeholder="ENTER AMOUNT FOR TRANSPORTATION">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Allowances</small>
                                <input type="text" name="allowances" class="form-control" placeholder="ENTER AMOUNT FOR ALLOWANCES">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Others</small>
                                <input type="text" name="others" class="form-control" placeholder="ENTER AMOUNT FOR OTHERS">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <small>Member Signature</small>
                                <input type="file" name="scanned_signature" alt="" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
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
            </div>
        </form>
    </div>
</div>

@endsection
