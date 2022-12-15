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
        <select name="loan_type" id="" class="form-control">
            @if (Request::is('special-loan-application'))
                @include('client.loan_application.special-loan-products')
            @elseif (Request::is('regular-loan-application'))
                @include('client.loan_application.regular-loan-products')
            @endif
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
