@extends('client.dashboard.index')
@section('title', 'Amortization')
@section('client_dashboard_content')

@foreach ($loan->regularSpecial as $l )

    

<?php                  
                    
                    $loan_type = $l->monthlyI->product_loan;
                    $mode_of_payment = $l->monthlyI->mode_of_payment;
                    $amount = (int)$l->monthlyI->amount_applied;
                    $term_applied = (int)$l->monthlyI->term_applied;
                    $status = $loan->is_approved;
                    $date_app = $loan->created_at;
                    $x=1;
                    // $semi = 14;
                    $y =1;
                    $now = strtotime($date_app);
                    // $start = date('m/15/Y');
                    // // $month_mid = date("m/15/Y", strtotime($start));
                    // // $month_last = date("m/t/Y", strtotime($start));             
                    // // $start = date("m/d/Y",strtotime($start." +1month"));
                    // // $start = date("m/d/Y",strtotime($start." +15day"));


                    if($loan_type == "midyear & christmas loan"){
                        if($amount >= 50000){
                            $servicefee = $amount*0.025+60;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.013;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if($amount <= 30000){
                            $servicefee = $amount*0.03+60+100;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.015;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                       
                    if($mode_of_payment == "semi-monthly") {
                        if ($amount >= 50000){
                            $servicefee = $amount*0.025+60;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.013/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if($amount <= 30000){
                            $servicefee = $amount*0.03+60;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.015/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                           

                    }

                    }

                    if($loan_type == "multi-purpose loan"){
                        if ($amount <= 50000) {
                        $servicefee = $amount*0.05+50+200;
                        $deduction = $amount-$servicefee;
                        $term_app = $term_applied;
                        $monthly = $amount/$term_applied;
                        $interest=$amount*0.015;
                        $totalinterest=$interest*$term_applied;
                        $totalamount=$amount+$totalinterest;
                        $monthlyINt = $monthly+$interest;
                        $repayment = $totalamount-$monthlyINt;
                        }
                        if ($amount <= 100000) {
                        $servicefee = $amount*0.05+100+200;
                        $deduction = $amount-$servicefee;
                        $term_app = $term_applied;
                        $monthly = $amount/$term_applied;
                        $interest=$amount*0.01;
                        $totalinterest=$interest*$term_applied;
                        $totalamount=$amount+$totalinterest;
                        $monthlyINt = $monthly+$interest;
                        $repayment = $totalamount-$monthlyINt;
                        }
                        if ($amount <= 200000) {
                        $servicefee = $amount*0.05+200+200;
                        $deduction = $amount-$servicefee;
                        $term_app = $term_applied;
                        $monthly = $amount/$term_applied;
                        $interest=$amount*0.0083;
                        $totalinterest=$interest*$term_applied;
                        $totalamount=$amount+$totalinterest;
                        $monthlyINt = $monthly+$interest;
                        $repayment = $totalamount-$monthlyINt;
                        }
                       

                        if($mode_of_payment == "semi-monthly"){
                            if($amount <= 50000){

                                $servicefee = $amount*0.05+50+200;
                                $deduction = $amount-$servicefee;
                                $term_app = $term_applied*2;
                                $monthly = $amount/$term_app;
                                $interest=$amount*0.015/2;
                                $totalinterest=$interest*$term_app;
                                $totalamount=$amount+$totalinterest;
                                $monthlyINt = $monthly+$interest;
                                $repayment = $totalamount-$monthlyINt;
                            }
                            if($amount <= 100000){

                                $servicefee = $amount*0.05+100+200;
                                $deduction = $amount-$servicefee;
                                $term_app = $term_applied*2;
                                $monthly = $amount/$term_app;
                                $interest=$amount*0.01/2;
                                $totalinterest=$interest*$term_app;
                                $totalamount=$amount+$totalinterest;
                                $monthlyINt = $monthly+$interest;
                                $repayment = $totalamount-$monthlyINt;
                            }

                            if($amount <= 100000){

                                $servicefee = $amount*0.05+200+200;
                                $deduction = $amount-$servicefee;
                                $term_app = $term_applied*2;
                                $monthly = $amount/$term_app;
                                $interest=$amount*0.0083/2;
                                $totalinterest=$interest*$term_app;
                                $totalamount=$amount+$totalinterest;
                                $monthlyINt = $monthly+$interest;
                                $repayment = $totalamount-$monthlyINt;
                                }
                        

                        }


                    }
                    if($loan_type == "previlige loan"){

                        $servicefee = $amount*0.025+60;
                        $deduction = $amount-$servicefee;
                        $term_app = $term_applied;
                        $monthly = $amount/$term_applied;
                        $interest=$amount*0.0075;
                        $totalinterest=$interest*$term_applied;
                        $totalamount=$amount+$totalinterest;
                        $monthlyINt = $monthly+$interest;
                        $repayment = $totalamount-$monthlyINt;

                    if($mode_of_payment == "semi-monthly"){
                        $servicefee = $amount*0.025+60;
                        $deduction = $amount-$servicefee;
                        $term_app = $term_applied*2;
                        $monthly = $amount/$term_app;
                        $interest=$amount*0.0075/2;
                        $totalinterest=$interest*$term_app;
                        $totalamount=$amount+$totalinterest;
                        $monthlyINt = $monthly+$interest;
                        $repayment = $totalamount-$monthlyINt;
                    }
                    }
                    if($loan_type == "medical loan"){

                    $servicefee = $amount*0.025+60;
                    $deduction = $amount-$servicefee;
                    $term_app = $term_applied;
                    $monthly = $amount/$term_applied;
                    $interest=$amount*0.0083;
                    $totalinterest=$interest*$term_applied;
                    $totalamount=$amount+$totalinterest;
                    $monthlyINt = $monthly+$interest;
                    $repayment = $totalamount-$monthlyINt;

                    if($mode_of_payment == "semi-monthly"){
                        $servicefee = $amount*0.025+60;
                        $deduction = $amount-$servicefee;
                        $term_app = $term_applied*2;
                        $monthly = $amount/$term_app;
                        $interest=$amount*0.0083/2;
                        $totalinterest=$interest*$term_app;
                        $totalamount=$amount+$totalinterest;
                        $monthlyINt = $monthly+$interest;
                        $repayment = $totalamount-$monthlyINt;

                    }
                    }
                    if($loan_type == "travel loan"){
                        if($amount >= 9999){
                            $servicefee = $amount*0.025+60+50;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.013;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if($amount >= 50000){
                            $servicefee = $amount*0.025+60+100;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.013;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                   

                    if($mode_of_payment == "semi-monthly"){
                        if ($amount >= 9999) {
                            $servicefee = $amount*0.025+60+50;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.013/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if ($amount >= 50000) {
                            $servicefee = $amount*0.025+60+100;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.013/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                   
                    }
                    }
                    if($loan_type == "instant loan"){
                        if ($amount >= 9999) {
                            $servicefee = $amount*0.03+60+50;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.015;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if ($amount >= 25000) {
                            $servicefee = $amount*0.03+60+100;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.015;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }

                    

                    if($mode_of_payment == "semi-monthly"){
                        if (amount >= 9999) {
                            $servicefee = $amount*0.03+60+50;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.015/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if (amount >= 25000) {
                            $servicefee = $amount*0.03+60+100;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.015/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                    
                    }
                    }


                    if($loan_type == "car loan"){
                        if ($amount >= 500000) {
                            $servicefee = $amount*0.1;
                            $procefee = $amount*0.1;
                            $totalsericefee = $servicefee + $procefee;
                            $deduction = $amount-$totalsericefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.0042;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if ($amount >= 1000000) {
                            $servicefee = $amount*0.08;
                            $procefee = $amount*0.05;
                            $totalsericefee = $servicefee + $procefee;
                            $deduction = $amount-$totalsericefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.0042;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if ($amount >= 1500000) {
                            $servicefee = $amount*0.06;
                            $procefee = $amount*0.03;
                            $totalsericefee = $servicefee + $procefee;
                            $deduction = $amount-$totalsericefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.0042;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }

                    

                    if($mode_of_payment == "semi-monthly"){
                        if (amount >= 500000) {
                            $servicefee = $amount*0.1;
                            $procefee = $amount*0.1;
                            $totalsericefee = $servicefee + $procefee;
                            $deduction = $amount-$totalsericefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.0042/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                        if (amount >= 1000000) {
                            $servicefee = $amount*0.08;
                            $procefee = $amount*0.05;
                            $totalsericefee = $servicefee + $procefee;
                            $deduction = $amount-$totalsericefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.0042/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }

                        if (amount >= 1500000) {
                            $servicefee = $amount*0.06;
                            $procefee = $amount*0.03;
                            $totalsericefee = $servicefee + $procefee;
                            $deduction = $amount-$totalsericefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_app;
                            $interest=$amount*0.0042/2;
                            $totalinterest=$interest*$term_app;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                    
                    }
                    }
                    if($loan_type == "provident loan"){
                        
                        
                            $servicefee = $amount*0.02+80;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.02;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                        }
                    
                    

                    if($mode_of_payment == "semi-monthly"){
                       

                            $servicefee = $amount*0.02+80;
                            $deduction = $amount-$servicefee;
                            $term_app = $term_applied*2;
                            $monthly = $amount/$term_applied;
                            $interest=$amount*0.02/2;
                            $totalinterest=$interest*$term_applied;
                            $totalamount=$amount+$totalinterest;
                            $monthlyINt = $monthly+$interest;
                            $repayment = $totalamount-$monthlyINt;
                       
                    
                    }
                    

    ?>


<div class=" text-center">
                    
    <h4 >CASALCO AMORTIZATION</h4>
</div>
                
    <div class="row pt-5">
        <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                <div class="row">
                <div class="col-lg-4 col-sm-12">
                <label for="name">LOAN PRODUCT:</label>
                <h5>{{$l->monthlyI->product_loan}}</h5>
                
                </div>
                
                <div class="col-lg-4 col-sm-12">
                <label for="name">LOAN TYPE:</label>
                <h5>{{$loan->loan_type}}</h5>
                
                </div>

                <div class="col-lg-4 col-sm-12">
                <fieldset>
                <label for="name"> TERM APPLIED:</label>
                <h5> {{$term_app}} {{$l->monthlyI->mode_of_payment}}</h5>
                </fieldset>
                </div>
                <div class="col-lg-4 col-sm-12">
                <fieldset>
                <label for="name"> PRINCIPAL:</label>
                <h5>PHP <?php echo number_format($amount, 2, '.', ',')?></h5>
                </fieldset>
                </div>
                <div class="col-lg-4 col-sm-12">
                <fieldset>
                <label for="name"> AMOUNT TO RECIEVE:</label>
                <h5>PHP {{number_format($deduction, 2, '.', ',')}}</h5>
                </fieldset>
                </div>
                <div class="col-lg-4 col-sm-12">
                <fieldset>
                <label for="name">INTEREST:</label>
                <h5> {{number_format($totalinterest, 2, '.', ',')}}</h5>
                </fieldset>
                </div>
                <div class="col-lg-4 col-sm-12">
                <fieldset>
                <label for="name">TOTAL AMOUNT DUE:</label>
                <h5>PHP {{number_format($totalamount, 2, '.', ',')}}</h5>

                </fieldset>
                
            
        </div>
        
    </div>
</div>
</div>


<div class="card">
<div class="card-body">
  <div class="row">
      <!-- table section -->
      <div class="col-md-12">
          <div class="white_shd margin_bottom_20">
              <div class="table_section padding_infor_info">
                  <table class="table" id="loan_application">
                      <thead>
                          <tr>
                            
                            <th>Principal</th>
                            <th>Interest</th>
                            <th>Repayment</th>
                           
                          </tr>
                      </thead>
                      <tbody>
                         
                              
                        
                              <tr>
                               
    
                                            
    
                                   
                                    <td><span>{{number_format($monthly, 2, '.', ',')}}</span></td>
                                    <td><span>{{number_format($interest, 2, '.', ',')}}</span></td>
                                    <td><span>{{number_format($monthlyINt, 2, '.', ',')}}</span></td>
                                    
                                
                                </tr>
                            
                            
                               
                              
                              
                            
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
</div>












  
@endforeach
@endsection