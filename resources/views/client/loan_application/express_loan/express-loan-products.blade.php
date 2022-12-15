<div class="form-group">
    <small>TYPES OF LOAN APPLIED<span class="asterisk">*</span></small>
    <div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <small class="text-success">MAX. 8 MONTHS</small>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" id="pcl" name="product_loan" value="pcl" @checked(old('product_loan') === 'pcl')>
                    <label>PettyCash Loan</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <small class="text-success">MAX. 4 MONTHS</small>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" id="fcl" name="product_loan" value="fcl" @checked(old('product_loan') === 'fcl')>
                    <label>FastCash Loan</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <small class="text-success">MAX. 1 MONTH</small>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" id="icl" name="product_loan" value="icl" @checked(old('product_loan') === 'icl')>
                    <label>InstaCash Loan</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <small class="text-success">MAX. 12 MONTHS</small>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" id="check1" name="product_loan" value="bdl" @checked(old('product_loan') === 'bdl')>
                    <label>Birthday Loan</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <small class="text-success">MAX. 12 MONTHS</small>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" id="check1" name="product_loan" value="bdl" @checked(old('product_loan') === 'hcl')>
                    <label>Health Care Loan</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <small class="text-success">MAX. 12 MONTHS</small>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" id="check1" name="product_loan" value="cl"  @checked(old('product_loan') === 'cl')>
                    <label>Calamity Loan </label>
                </div>
            </div>
        </div>
        <small class="text-danger">@error('product_loan') {{ $message }}@enderror</small>
    </div>
</div>
