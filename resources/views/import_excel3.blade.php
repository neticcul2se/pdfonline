
{{ Session::put('lp', "")}}
<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title>Import Excel File in Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js'></script>
<script src='https://cdn.rawgit.com/simonbengtsson/jsPDF/requirejs-fix-dist/dist/jspdf.debug.js'></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>


</style>

 </head>
 <body>
   <?php

     if($lp = Session::get('lp'))
     {

       echo "xxxxxx";
     }
    ?>


   <h3 align="center">Import Excel File in Laravel</h3>
    <br />

    @if(count($errors) > 0)
     <div class="alert alert-danger">
      Upload Validation Error<br><br>
      <ul>
       @foreach($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
      </ul>
     </div>
    @endif


   @if($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif


   <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
  {{csrf_field()}}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" id="select_file" name="select_file" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
        <a href="{{ url("/clear") }}" class="btn btn-danger">Clear</a>


       </td>





      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   <form class="" action="{{ url('/getPdf') }}" method="post" target="_blank">
     {{csrf_field()}}
     <div class="form-group" align="center">
        <b> ออกได้ทีละ 50 ใบ </b>
        <label>start </label> <input type="text" name="start" value="">

         <input type="submit" name="PDF" class="btn btn-primary" value="Export to PDF">
     </div>

   </form>

   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Customer Data</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>id</th>
        <th>date</th>
        <th>Name</th>
        <th>ProductName</th>

        <th>Quantity</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Total</th>
       </tr>
       @foreach($data as $row)
       {{ Session::put('test', $row->order_no)}}
       <?php
            //$newText = str_replace(';','', Session::get('test'));
              $newText = Session::get('test');


        ?>

        <tr>


        <td>{{ $row->inv }}</td>
        <td>{{ $row->order_date }}</td>

        <td>{{ $row->name }} </td>

        <td>{{ $row->ProductName }}</td>
        <td>{{ $row->quantity }}</td>
        <td>{{ $row->price }}</td>
        <th>{{ $row->discount }}</th>

        <td>{{ ($row->price  * $row->quantity)-$row->discount }} </td>

       </tr>

       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>

 </body>
</html>
