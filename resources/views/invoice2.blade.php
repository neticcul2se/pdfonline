<?php $ssidorder2 = 0;
ini_set('max_execution_time', 300);
?>
{{ Session::put('idorder2', "")}}

@foreach($data as $row)
{{ Session::put('idorder', $row->order_no)}}

<?php

     //$newText = str_replace(';','', Session::get('test'));
      $ssidorder = Session::get('idorder');
       $ssidorder2 = Session::get('idorder2');
     if($ssidorder==$ssidorder2){
      ?>
@continue
      <?php
     }


 ?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
@page {
  size: A4;
  margin: 40px;
}

</style>

<style type="text/css">
h3 {
  padding: 0px;
  margin: 0px;
}
 h2
 {

   padding: 0px;
   margin: 0px;
 }
 input[type=checkbox] { display: inline; }

@font-face{
 font-family:  'TH Niramit AS';
 font-style: normal;
 font-weight: normal;
 src: url("fonts/THSarabunNew.ttf") format('truetype');
}
@font-face{
 font-family:  'THSarabunNew';
 font-style: normal;
 font-weight: bold;
 src: url("fonts/THSarabunNew Bold.ttf") format('truetype');  }
@font-face{
 font-family:  'THSarabunNew';
 font-style: italic;
 font-weight: normal;
 src: url("fonts/THSarabunNew Italic.ttf") format('truetype');
}
@font-face{
 font-family: 'THSarabunNew';
 font-style: italic;
 font-weight: bold;
 src: url("fonts/THSarabunNew Bold Italic.ttf") format('truetype');
}
body{
  font-family: "TH Niramit AS";
  line-height: 100%;
  font-weight: 600;


}
.total2{
  display:inline;
}
.a1{display:block;height:1px;background:black;margin-top:25px;
width:150px; margin-left: 40px;

float:left;

}

.a11{display:block;height:1px;background:black;margin-top:25px;
width:150px; margin-left: 215px;

float:left;

}
.f1{display:block;height:1px;background:black;
width:100px;
margin-top:20px;
margin-left: 10px
float:left;

}
.f2{


}

.f3{

  padding-top:5px;
  padding-right: 20px
}

.a2{
display:inline;
margin-right:  150px;
}
.a4{
  margin-right: 20px;
}

th{

  padding: 0px;
  margin: 0px;
}
td{
  padding: 0px;
  margin: 0px;

}
hr{
  padding: 0px;
  margin: 0px;

}

.information .logo {

}
.information table {

}


.page-break{
  page-break-after: always;
}
.page-break:last-child{
  page-break-after: avoid;
}


</style>
</head>

<body>

<div class="main">

<div class="t1">


<table width="100%"  >

<tr>

<td width="70%">
<img src="image/lg1.jpg"  alt="description here" width="100" />
<h2>บริษัท บี สปอร์ต เทรดดิ้ง จำกัด</h2>
59/6 ถ.เทศบาลสาย 3 ต.ท่าใหม่ อ.ท่าใหม่ จ.จันทบุรี 22120 <br />
เลขประตัวผู้เสียภาษี : 0225561001769 (00000) <br>
โทร 0876048444 <br />
เบอร์มือถือ 0876048444
<h3>ลูกค้า</h3>
<!-- ชื่อลูกค้า -->
{{ $row->name }}

 <br />


{{ $row->address_1	 }}   <br />
{{ $row->district}} {{ $row->province }} {{ $row->zip }}<br />
</td>

<td align="left" valign="top" >
  <h2 align="center" v>ใบกำกับภาษี/ใบเสร็จรับเงิน</h2>

<h3 align="center">สำเนา (ออกเอกสารเป็นชุด)</h3>
<hr>

เลขที่ {{ $row->inv }} <br />
วันที่  {!! Helper::changeDate($row->order_date) !!} <br />
ครบกำหนด {!! Helper::changeDate($row->order_date) !!}  <br />
ผู้ขาย  ชัชพล อนันตวงศ์ <br />
<hr>
ผู้ติดต่อ {{ $row->name }}


</td>

</tr>

</table>
</div>

<br />
<div class="invoice">
  <!-- <table class="">
   <tr>
    <th>id</th>
    <th>Name</th>
    <th>date</th>
    <th>Address</th>
    <th>City</th>
    <th>Postal Code</th>
    <th>Country</th>

   </tr>

   <tr>
    <td>{{ $row->order_no }}</td>
    <td>{{ $row->order_date }}</td>
    <td>{{ $row->name }} </td>
    <td>{{ $row->address_1	 }}   {{ $row->district}} </td>
    <td>{{ $row->province }}</td>
    <td></td>
    <td></td>
   </tr>

  </table> -->


    <table width="100%">
        <thead>
          <tr>
            <td colspan="5"> <hr> </td>
          </tr>
        <tr>
            <th>#</th>
            <th width="60%">รายละเอียด</th>
            <th>จำนวน</th>
            <th>ราคาต่อหน่วย</th>
            <th>ยอดรวม</th>
        </tr>
        <tr>
          <td colspan="5"> <hr> </td>
        </tr>
        </thead>
        <tbody>
          <?php
          $dis=0;
          $total=0;
          $net=0;
          $numid=1;
          ?>
             @foreach($data as $row2)

             <?php


                   if($ssidorder==$row2->order_no)
                   {?>
                     {{ Session::put('idorder2', $row2->order_no)}}

                     <tr>
                         <td><?=$numid;?></td>
                         <td>{{ $row2->ProductName }}</td>
                         <td align="left">{{ $row2->quantity }}</td>
                         <td align="left">{{ $row2->price }}</td>
                         <td align="left">{{ $row2->quantity*$row2->price }}</td>

                     </tr>

                       <?php
                         $net=$net+$row2->order_net;
                         $total=$total+($row2->quantity*$row2->price);
                         $dis=$dis+$row2->discount;
                         $numid=$numid+1;


                   }
                   else{

                   }

                     ?>

        @endforeach

        <tr>
          <td colspan="5"> <hr> </td>
        </tr>


        </tbody>

        <tfoot>

        <tr>

            <td colspan="3"></td>

            <td align="left">รวมเป็นเงิน</td>
              <td align="left" class="gray"> <?=$total; ?>    บาท</td>


        </tr>
        </tfoot>

    </table>
    <hr>

    <?php
                $novat=number_format($net-($net*7/107),2,'.','');
                $vat=number_format($net-$novat,2,'.','');


    ?>
    <table width="100%">
      <tr >
        <td rowspan="5" width="60%" > </td>
      </tr>
      <tr align="right" >
        <td > ส่วนลด </td>
        <td>  <?=$dis; ?> </td>
        <td>  บาท</td>
      </tr>
      <tr align="right" >
        <td >  จำนวนเงินหลังหักส่วนลด </td>
        <td>  <?=$total-$dis; ?> </td>
        <td>  บาท</td>
      </tr>

      <tr align="right" >
        <td > ภาษีมูลค่าเพิ่ม 7% </td>
        <td>  <?=$vat; ?> </td>
        <td>  บาท</td>
      </tr>
      <tr align="right">
        <td> ราคาไม่รวมภาษีมูลค่าเพิ่ม</td>
        <td> <?=$novat; ?></td>
        <td> บาท</td>
      </tr>
      <tr align="right">
        <td align="left"> <b>( {!! Helper::m2t(  $net) !!}) </b></td>
        <td>จำนวนเงินทั้งสิ้น</td>
        <td><?=$net; ?></td>
        <td> บาท</td>
      </tr>
      <tr >
<td> </td>

        <td colspan="4" width="30%" > <hr> </td>
      </tr>
    </table>
    <br />
    <br />
</div>

<div class="total" style="position: absolute; bottom: 110px;">
  การชำระสมบูรณ์เมื่อบริษัทได้รับเงินเรียบร้อยแล้ว
  <input type="checkbox" checked="checked"/><span> เงินสด</span>
  <input type="checkbox" /><span> เช็ค</span>
  <input type="checkbox" /><span> โอนเงิน</span>
  <input type="checkbox" /><span> บัตรเครดิต</span> <br />
<div class="total2">


  <span class="a2">ธนาคาร </span><span class="a1">   </span>
    <span class="a2">เลขที่ </span> <span class="a11">   </span>
        <span class="a4">วันที {!! Helper::changeDate($row->order_date) !!} </span>
        <span class="a4">จำนวนเงิน <?=$net; ?> </span>
</div>




</div>


</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr >
            <td align="left"  colspan="2" style="width:20%; ">
              ในนาม {{ $row->name }}
            </td>

            <td align="center" style="width:20%;"  rowspan="4" >
              <img src="image/lg1.jpg" alt="Logo" width="100" class="logo" />
            </td>
              <td></td>
            <td align="right" colspan="2" style="width: 20%;">
                ในนาม บริษัท บี สปอร์ต เทรดดิ้ง จำกัด
            </td>


        </tr>
        <tr >
          <td style="width: 25%; " align="center"  class="f3" >   </td>
          <td style="width: 25%;" align="center"  class="f3" >    </td>
          <td></td>
          <td style="width: 25%;" align="center" class="f3" > ชัชพล อนันตวงศ์ </td>
          <td style="width: 25%;" align="center" class="f3" >      </td>

        </tr>
        <tr  >
          <td style="width: 25%; " align="center">   <span class="a5"> </span> <span class="f1">   </span></td>
          <td style="width: 25%;" align="center">     <span class="a5"> </span> <span class="f1">   </span></td>
          <td></td>
          <td style="width: 25%;" align="center">     <span class="a5"> </span> <span class="f1">   </span></td>
          <td style="width: 25%;" align="center">      <span class="a5"> </span> <span class="f1">   </span></td>

        </tr>

        <tr margin="0;">
          <td  class="f3" style="width: 25%;" align="center" >  ผู้จ่ายเงิน</td>
          <td class="f3" style="width: 25%;" align="center" >  วันที่</td>
          <td></td>

          <td class="f3" style="width: 25%;" align="center">  ผู้รับเงิน</td>
          <td  class="f3"style="width: 25%;" align="center">  วันที่</td>
        </tr>
    </table>
</div>

<div class="page-break"></div>
@endforeach
</div>
</body>
</html>
