<style>
    .top_rw{ background-color:#f4f4f4; }
	.td_w{ }
	button{ padding:5px 10px; font-size:14px;}
    .invoice-box {
        max-width: 890px;
        margin: auto;
        padding:10px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 14px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
		border-bottom: solid 1px #ccc;
    }
    .invoice-box table td {
        padding: 5px;
        vertical-align:middle;
    }
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
		font-size:12px;
    }
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    .rtl table {
        text-align: right;
    }
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
</style>

<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top_rw">
            <td colspan="2">
                <h2 style="margin-bottom: 0px;"> Invoice No:{{$order_summary->id}} </h2>
                <span style="">Date: {{$order_summary->created_at->format('M d,Y')}} </span>
            </td>
        </tr>
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr>
                        <td>
                            <b> Sold By: {{env('APP_NAME')}} </b> <br>
                            Delhivery Pvt. Ltd. Plot No. A5 Indian Corporation <br>
                            Warehouse Park Village Dive-anjur, Bhiwandi, Off <br>
                            Nh-3, Near Mankoli Naka, District Thane, Pin Code :
                            421302 <br>
                            Mumbai, Maharashtra - 421302 <br>
                            PAN: AALFN0535C <br>
                            GSTIN: 27AALFN0535C1ZK <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
              <td colspan="3">
                <table>
                    <tr>
                        <td colspan="2">
                        <b> Shipping Address: {{$order_summary->customer_name}} </b> <br>
                            {{$order_summary->customer_address}} <br>
                            {{$order_summary->customer_phone_number}}<br>
                            {{$order_summary->customer_email}}<br>
                        </td>
                        <td> <b> Billing Address:{{App\Models\user::find($order_summary->user_id)->name}} </b><br>
                            {{App\Models\user::find($order_summary->user_id)->email}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
                        <td colspan="3">
        <table cellspacing="0px" cellpadding="2px">
        <tr class="heading">
            <td style="width:25%;">
                ITEM
            </td>
            <td style="width:10%; text-align:center;">
                COLOR
            </td>
            <td style="width:10%; text-align:right;">
                SIZE
            </td>
            <td style="width:15%; text-align:right;">
                PRICE X QTY.
            </td>
            <td style="width:15%; text-align:right;">
               TOTAL AMOUNT
            </td>
        </tr>
        @foreach ($order_details as $order_detail_info )
        <tr class="item">
            <td style="width:25%;">
               {{$order_detail_info->relationToproduct->product_name}}
            </td>
            <td style="width:10%; text-align:center;">
                {{$order_detail_info->relationTocolor->color_name}}
            </td>
            <td style="width:10%; text-align:right;">
                {{$order_detail_info->relationTosize->size_name}}
            </td>
            <td style="width:15%; text-align:right;">
                {{$order_detail_info->product_current_price}} x {{$order_detail_info->amount}}
            </td>
            <td style="width:15%; text-align:right;">
                {{$order_detail_info->product_current_price*$order_detail_info->amount}}
            </td>
        </tr>
        @endforeach
        <tr class="item">
           <td style="width:30%;"> <b> Sub Total </b> </td>
            <td style="width:25%; text-align:center;">
            </td>
            <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
                {{$order_summary->sub_total}}
            </td>
        </tr>
        <tr class="item">
           <td style="width:30%;"> <b> Shopping Charge </b> </td>
            <td style="width:25%; text-align:center;">
            </td>
            <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
                {{$order_summary->shopping_charge}}
            </td>
        </tr>
        <tr class="item">
           <td style="width:30%;"> <b> Discount Amount </b> </td>
            <td style="width:25%; text-align:center;">
            </td>
            <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
                {{$order_summary->discount_amount}}
            </td>
        </tr>
        <tr class="item">
           <td style="width:30%;"> <b> Grand Total </b> </td>
            <td style="width:25%; text-align:center;">
            </td>
            <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
            </td>
             <td style="width:15%; text-align:right;">
                {{$order_summary->grand_total}}
            </td>
        </tr>
        </td>
        </table>
        {{-- {{Terbilang::make() }} --}}
        <tr class="total">
              <td colspan="3" align="right">  Total Amount in Words : {{$order_summary->grand_total}} <b> </b> </td>
        </tr>
        <tr>
           <td colspan="3">
             <table cellspacing="0px" cellpadding="2px">
                <tr>
                    <td width="50%">
                        <b> Declaration: </b> <br>
                        We declare that this invoice shows the actual price of the goods
                        described above and that all particulars are true and correct. The
                        goods sold are intended for end user consumption and not for resale.
                    </td>
                    <td>
                     * This is a computer generated invoice and does not
                      require a physical signature
                    </td>
                </tr>
                 <tr>
                    <td width="50%">
                    </td>
                    <td>
                         <b> Authorized Signature </b>
                        <br>
                        <br>
                        ...................................
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
             </table>
           </td>
        </tr>
    </table>
</div>
