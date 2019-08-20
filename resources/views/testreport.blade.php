<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <title>Import Excel File in Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js'></script>
<script src='https://cdn.rawgit.com/simonbengtsson/jsPDF/requirejs-fix-dist/dist/jspdf.debug.js'></script>
<script src='https://unpkg.com/jspdf-autotable@2.3.2'></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<style>


</style>

 </head>
 <body>
 <script>
 var base64Img = null;
 imgToBase64("{{ asset('image/octocat.jpg')}}", function(base64) {
     base64Img = base64;
 });

 margins = {
   top: 70,
   bottom: 40,
   left: 30,
   width: 550
 };


 generate = function()
 {
 	var pdf = new jsPDF('p', 'pt', 'a4');
 	pdf.setFontSize(18);
   for(i=1;i<=10;i++){

   	pdf.fromHTML(document.getElementById('html-2-pdfwrapper'),
 		margins.left, // x coord
 		margins.top,
 		{
 			// y coord
 			width: margins.width// max width of content on PDF
 		},function(dispose) {
 			headerFooterFormatting(pdf, pdf.internal.getNumberOfPages());
 		},
 		margins);
 /*
 	var iframe = document.createElement('iframe');
 	iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:650px; padding:20px;');
 	document.body.appendChild(iframe);

 	iframe.src = pdf.output('datauristring');*/
 if(i<10){
     pdf.addPage();
   }
   }
   pdf.save();
 };
 function headerFooterFormatting(doc, totalPages)
 {
     for(var i = totalPages; i >= 1; i--)
     {
         doc.setPage(i);
         //header
         header(doc);

         footer(doc, i, totalPages);
         doc.page++;
     }
 };

 function header(doc)
 {
     doc.setFontSize(30);
     doc.setTextColor(40);
     doc.setFontStyle('normal');

     if (base64Img) {
        doc.addImage(base64Img, 'JPG', margins.left, 10, 40,40);
     }


   doc.text("receive", margins.left + 50, 40 );
 	doc.setLineCap(2);
 	doc.line(3, 70, margins.width + 43,70); // horizontal line
 };


 function imgToBase64(url, callback, imgVariable) {

     if (!window.FileReader) {
         callback(null);
         return;
     }

     var xhr = new XMLHttpRequest();
     xhr.responseType = 'blob';
     xhr.onload = function() {
         var reader = new FileReader();
         reader.onloadend = function() {
 			imgVariable = reader.result.replace('text/xml', 'image/jpeg');
             callback(imgVariable);

         };

         reader.readAsDataURL(xhr.response);
     };
     xhr.open('GET', url);
     xhr.send();
 };

 function footer(doc, pageNumber, totalPages){

     var str = "Page " + pageNumber + " of " + totalPages

     doc.setFontSize(10);
     doc.text(str, margins.left, doc.internal.pageSize.height - 20);

 };

  </script>

 <button onclick="generate()">Generate PDF</button>

  <br />

  <div class="container">

  <div id="html-2-pdfwrapper" class="xxx" style='position: absolute; left: 20px; top: 50px; bottom: 0; overflow: auto; width: 600px'>


  		<h1 >Html2Pdf</h1>
  		<p>
  			This demo uses Html2Canvas.js to render HTML. <br />Instead of using an HTML canvas however, a canvas wrapper using jsPDF is substituted. The <em>context2d</em> provided by the wrapper calls native PDF rendering methods.
  		</p>

  			<span style='color: red'>red</span> <span style='color: rgb(0, 255, 0)'>rgb(0,255,0)</span> <span style='color: rgba(0, 0, 0, .5)'>rgba(0,0,0,.5)</span> <span style='color: #0000FF'>#0000FF</span> <span style='color: #0FF'>#0FF</span>
  		</p>

      <div class="invoice">
        <div class="row">
          <div class="col-6">
            <br />    <br />
            <strong id="nameco">TEST</strong><br />
              90TECH SAS<br>
            6B Rue Aux-Saussaies-Des-Dames<br>
            57950 MONTIGNY-LES-METZ

          </div>
          <div id="capture" style="padding: 10px; background: #f5da55">
              <h4 style="color: #000; ">Hello world!</h4>
          </div>
          <div class="col-6">
            <h4>receive</h4>

          </div>
        </div>
          <div class="row">
<div class="col-6">
<strong> ลูกค้า</strong> <br />


</div>
</div>





      </div>



  </div>





  <br />
  <br /><br /><br />
  <br /><br /><br /><br />
  <br /><br /><br />
  <br /><br /><br />
<br />
<br /><br /><br />
<br /><br /><br />

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
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Postal Code</th>
        <th>Country</th>
       </tr>
       @foreach($data as $row)
       <tr>
        <td>{{ $row->order_no }}</td>
        <td>{{ $row->name }} </td>
        <td>{{ $row->address_1	 }}   {{ $row->district}} </td>
        <td>{{ $row->province }}</td>
        <td></td>
        <td></td>
       </tr>
       @endforeach
      </table>
     </div>
    </div>
   </div>
  </div>

 </body>
</html>
