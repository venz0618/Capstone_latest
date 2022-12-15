<form action="{{ url('/apply-loan') }}" method="POST" enctype="multipart/form-data" class="this-form">
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

            @include('client.loan_application.personal-info')
        </div>

        @include('client.loan_application.credit-assessment-list')

        <div class="row">
            @include('client.loan_application.regular_special_submit_btn')
        </div>
    </div>
</form>
