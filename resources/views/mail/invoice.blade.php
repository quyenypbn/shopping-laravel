<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail</title>
    
   
</head>
<body style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin: 0;font-family: 'Arimo', sans-serif,verdana,arial;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff;font-weight: 300;margin-top: 40px;background: #DFE5E9;">
  <div id="main-content" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;width: 100%;padding: 0;background-color: transparent;">
            
            <div class="row invoice-page" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-right: -15px;margin-left: -15px;border:1px solid black">
               
                <div class="col-md-12 p-t-0" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;width: 100%;padding-top: 0!important;">
                    <div class="invoice panel panel-default p-40" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px;background-color: #fff;border: none;border-radius: 4px;-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);box-shadow: 0 1px 1px rgba(0,0,0,.05);border-color: #ddd;max-width: 100%;max-height: 100%;padding: 0!important;">
                        <div class="panel-body p-t-0" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 26px;background-color: #FFF;padding-top: 0!important;">
                            <div class="row" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-right: -15px;margin-left: -15px;">
                                <div class="col-md-12 align-center" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;width: 100%;text-align: center;">
                                     <h4 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 300!important;line-height: 1.1;color: inherit;margin-top: 10px;margin-bottom: 10px;font-size: 18px;padding-top: 20px;font-size: 30px">Hóa đơn thanh toán</h4>
                                </div>
                                <div class="col-md-12" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;width: 100%;">
                                    <div class="pull-left" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;width: 40%;display: inline-block;">
                                        <h4 class="w-500 c-gray" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500!important;line-height: 1.1;color: #8F8F8F!important;margin-top: 10px;margin-bottom: 10px;font-size: 18px;">Bên gửi</h4>
                                       SAN DIEGO
                                        <address style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px;font-style: normal;line-height: 1.42857143;">
                                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">Địa chỉ: Ngô Nội-Trung Nghĩa-Yên Phong-Bắc Ninh</div><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                                            @foreach ($bills as $bill)
                                              
                                           
                                            Số điện thoại: 0967999999
                                        </address>
                                    </div>
                                    <div class="pull-right" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;width: 40%;float: right;">
                                        <h4 class="w-500 c-gray" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500!important;line-height: 1.1;color: #8F8F8F!important;margin-top: 10px;margin-bottom: 10px;font-size: 18px;">Bên nhận</h4>
                                        <address style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-bottom: 20px;font-style: normal;line-height: 1.42857143;">
                                            <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;"><textarea class="width-300" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin: 0;font: inherit;color: inherit;overflow: hidden;font-family: inherit;font-size: inherit;line-height: inherit;border: 0;resize: none;margin-bottom: -25px;background: rgba(0,0,0,0);width: 300px!important;">{{$bill->name}}</textarea></strong><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                                            <div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">Địa chỉ: {{$bill->address}}</div><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                                           Số điện thoại: {{$bill->phone}}
                                        </address> 
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-right: -15px;margin-left: -15px;">
                                <div class="col-md-12" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;width: 100%;">
                                    <div class="row" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin-right: -15px;margin-left: -15px;">
                                        <div class="col-md-12 m-t-20 m-b-20" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;width: 100%;margin-top: 20px!important;margin-bottom: 20px!important;">
                                            <p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Ngày đặt hàng: </strong> {{$bill->created}}</p>
                                            
                                            
                                        </div>
                                    </div>
                                    <table class="table" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border-spacing: 0;border-collapse: collapse!important;background-color: transparent;width: 100%;max-width: 100%;margin-bottom: 20px;">
                                        <thead style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;display: table-header-group;">
                                            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                                                
                                                <th class=" t-ct" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;text-transform: uppercase;line-height: 1.42857143;vertical-align: bottom;border-top: 1px solid #ddd;border-bottom: 2px solid #ddd;background-color: #fff!important;">Sản phẩm</th>
                                                <th class="t-ct" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;text-transform: uppercase;line-height: 1.42857143;vertical-align: bottom;border-top: 1px solid #ddd;border-bottom: 2px solid #ddd;background-color: #fff!important;">Đơn giá</th>
                                                <th class="text-center" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: center;text-transform: uppercase;line-height: 1.42857143;vertical-align: bottom;border-top: 1px solid #ddd;border-bottom: 2px solid #ddd;background-color: #fff!important;">Số lượng</th>
                                                <th class="t-ct" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;text-transform: uppercase;line-height: 1.42857143;vertical-align: bottom;border-top: 1px solid #ddd;border-bottom: 2px solid #ddd;background-color: #fff!important;">Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                                            @foreach ($billdetail as $dt)
                                            <tr class="item-row" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                                               
                                                <td style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><div class="text-primary t-ct" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;color: #337ab7;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">{{$dt->nameProduct($dt->id_product)}}</strong></div></td>
                                                <td class="t-ct " style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;">
                                                        {{number_format($dt->unit_price)}} vnđ 
                                                </td>
                                                 <td class="t-ct " style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;">{{$dt->quantity}}</td>
                                                <td class="t-ct " style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;">{{number_format($dt->unit_price*$dt->quantity)}} vnđ</td>
                                            </tr>

                                            @endforeach
                                            
                                             <tr style="height: 50px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;"></tr>
                                            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                                                <td colspan="4" rowspan="4" style="margin-top: 20px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"></td>
                                                <td class="text-left" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Tạm tính</strong></td>
                                                <td class="text-center" id="subtotal" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: center;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">{{number_format($bill->total)}} VNÐ</strong></td>
                                            </tr>

                                            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                                                <td class="text-left no-border" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Phí ship</strong></td>
                                                <td class="text-center" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: center;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"> 
                                                    <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">0 VNÐ</strong>
                                                </td>
                                            </tr>
                                            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                                                <td class="text-left no-border" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">VAT</strong></td>
                                                <td class="text-center" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: center;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Ðã tính trong đơn giá</strong></td>
                                            </tr>
                                            <tr style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;page-break-inside: avoid;">
                                                <td class="text-left no-border" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: left;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><div style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Tổng cộng</strong></div></td>
                                                <td class="text-center" id="total" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding: 8px;text-align: center;overflow: hidden;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;background-color: #fff!important;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">{{number_format($bill->total)}} VNÐ</strong></td>
                                            </tr>
                                             @endforeach
                                        </tbody>
                                    </table> 
                                    <div class="well" style="text-align: center;margin-top: 100px;padding: 10px;margin-bottom: 10px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;min-height: 20px;background-color: #f5f5f5;border: 1px solid #e3e3e3;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
                                        Cảm ơn quý khách đã mua hàng tại <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">SAN DIEGO</strong>.Mọi phản hồi xin gửi qua <strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">nguyenthiquyen.conan@gmail.com</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 
        </div>
</body>
</html>
            