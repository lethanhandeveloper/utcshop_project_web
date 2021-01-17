<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hóa Đơn Mua Hàng</title></head>
<body onload="window.print()">
  <div id="wrapper" style="margin:0 auto; width:500px;">
    <table width="100%">
      <!--DWLayoutTable-->
      <tr>
        <td height="25" valign="top"align="center"><div align="left">
          <table width="100%">
            <tbody>
              <tr>
                <td width="5" height="95">&nbsp;</td>

                <td width="343"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="2" style="text-align: center;"><strong>CỬA HÀNG ĐIỆN THOẠI UTCSHOP</strong></td>
                            </tr>
                            <tr>
                              <td>Địa chỉ</td>
                              <td>:Hoàng Mai - Hà Nội</td>
                            </tr>
                            <tr>
                              <td width="65">Tel:</td>
                              <td>: 0972341193</td>
                            </tr>
                            <tr>
                              <td>Di Động </td>
                              <td>: 0978164307</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>:ustora@gmail.com</td>
                            </tr>
                          </tbody>
                        </table></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
              </tbody>
            </table>
          </div></td>
        </tr>
        <tr>
          <td width="562" height="25" valign="top"align="center">  <hr>
            <strong><font color="#FF0000" size="+2">HÓA ĐƠN XUẤT HÀNG</font></strong></td>
          </tr>
          <tr>
            <td height="54"  >                    
              <div align="left">

                <b>Thông tin Khách hàng:</div>
                  <table width="100%" >

                    <tr>
                      <td width="3%" >&nbsp;</td>
                      <td width="34%" >Họ tên:</td>
                      <td width="63%" >  <?php echo $_GET['custom_name']; ?>   </td>
                    </tr>
                    <tr>
                      <td >&nbsp;</td>
                      <td >Địa chỉ :</td>
                      <td >  <?php echo $_GET['address']; ?>     </td>
                    </tr>
                    <tr>
                      <td >&nbsp;</td>
                      <td >Điện thoại :</td>
                      <td >   <?php echo $_GET['phone']; ?></td>
                    </tr>

                    <tr>
                      <td>&nbsp;</td>
                      <td>Email : </td>
                      <td >   <?php echo $_GET['email']; ?> </td>
                    </tr>

                    <tr>
                      <td >&nbsp;</td>
                      <td >Ngày đặt hàng:</td>


                      <td ><?php echo $_GET['time']; ?></td>
                    </tr>
                    <tr>
                      <td >&nbsp;</td>
                      <td ><span class="style3">Phương thức thanh toán:</span></td>

                      <td ><?php echo $_GET['method']; ?></td>
                    </tr>

                  </table>
                  <br />
                  <span class="style3"><B>Thông tin về đơn đặt hàng : </B></span>
                  <table width="100%" style="border-collapse:collapse;">
                    <tr>
                      <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">STT</div></td>
                      <td width="30%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tên hàng</div></td>
                      <td width="25%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Giá</div></td>
                      <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Số lượng</div></td>
                      <td width="25%" align="right" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tổng cộng</div></td>
                    </tr>
                    <?php $stt=1;
                          $total=0;
                    ?>
                    <?php foreach ($detail_bill as $value): ?>
                      <?php   $total+=$value['price']*((100-$value['discount'])/100)*$value['quantity'];  ?>
                    <tr>
                      <td  align="left" style="border:1px solid green;"><div align="center"><?php echo $stt++; ?></div></td>
                      <td align="left" style="border:1px solid green;"><?=  $value['name']  ?></td>
                      <td  align="left" style="border:1px solid green;"><div align="center"><?= number_format($value['price']*((100-$value['discount'])/100))   ?><sup>Đ</sup> </div></td>
                      <td  align="left" style="border:1px solid green;"><div align="center"><?=  $value['quantity']  ?></div></td>
                       <td  align="left" style="border:1px solid green;"><div align="center"><?= number_format($value['price']*((100-$value['discount'])/100)*$value['quantity'])   ?><sup>Đ</sup> </div></td>
                    </tr>
                  <?php endforeach ?>

                  <tr style="border:1px solid green;">
                    <td colspan="4" align="left"><div align="right">Tổng giá trị đơn hàng:<?= number_format($total) ?><sup>Đ</sup></div></td>
                    <td align="right" ><b></b></td>
                  </tr>     

                </table>

                <table width="452" border="0" align="right">
                  <tr>
                    <td colspan="3"><div align="right"> </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><strong>Nhân viên Bán hàng</strong></div></td>
                    <td>&nbsp;</td>
                    <td><div align="center"><strong>Khách hàng</strong></div></td>
                  </tr>
                  <tr>
                    <td height="23"><div align="center">(Ký tên +Đóng dấu Công ty)</div></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="73">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>

                </table>
                <p>&nbsp;</p>
                <p><br>
                </p>
              </td>
            </tr>
          </table>
        </div>
      </body>
      </html>
