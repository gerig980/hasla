<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProductSample implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all()->take(2);
    }

    public function headings(): array

    {

        return ["ID", "User_id", "Customer_id", "Admin_id","Order_Code","Name","Address","Address_Two","City_id","Country_id","zipcode","Mobile","Email","Shipping_Cost","Coupon_code","Coupon_Amount","Payment_status","Payment_method_id","Order_status_id","Payment_Gateway","Totali","Order_From","Deliver_Order_id","Pieces","Weight","Krijuar","Perditesuar"];

    }
}
