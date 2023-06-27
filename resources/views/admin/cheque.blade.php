@component('mail::message')
## Hello {{$user->fullName}},

@php
    $total = $user->salary / 12;
   
    $insurance = number_format(100, 2);
    $savings = number_format(150, 2);
    $tax = number_format($total * 0.02, 2);
    $mortgage = number_format($total * 0.10, 2);
    $bal = $total - $insurance - $savings - $tax;
    $balance = number_format($bal, 2);

@endphp

Your ${{number_format($total, 2)}} monthly salary breakdown is as follows:

@component('mail::table')

| Deductions    | Amount              |
| :-----------: | :-----------------: |
| Insurance     | {{"$".$insurance}}  |
| Mortgage      | {{"$".$mortgage}}   |
| Savings       | {{"$".$savings}}    |
| Tax(2%)       | {{"$".$tax}}        | 
| ------------- | ------------------- |
| Total Balance | {{"$".$balance}}    |

@endcomponent        

Yours Sincerely,<br>
{{ config('app.name') }}

@endcomponent