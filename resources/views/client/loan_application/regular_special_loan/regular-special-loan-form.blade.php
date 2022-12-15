<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="mem-bg">
        <form action="">
            <div class="content-form-page">
                @csrf
                @include('client.loan_application.regular_special_loan.personal-info')
                @include('client.loan_application.regular_special_loan.credit-assessment-list')
            </div>
                <div class="line"></div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <button class="submit_btn" type="submit">SUBMIT APPLICATION</button>
            </div>
            <div class="col-lg-4"></div>
        </form>
    </div>
</div>
