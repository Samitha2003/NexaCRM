<x-mail::message>
# Invoice #{{ $invoice->invoice_number }}

Dear Customer,

An invoice has been generated for your account. Please find the summary below:

* **Invoice Number:** {{ $invoice->invoice_number }}
* **Amount Due:** ${{ number_format($invoice->amount, 0) }}
* **Status:** {{ ucfirst($invoice->status) }}

@if($invoice->notes)
**Notes:**  
{{ $invoice->notes }}
@endif

<x-mail::button :url="$paymentUrl" color="success">
Pay Invoice Now
</x-mail::button>

If you have any questions, please reply directly to this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
