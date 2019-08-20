<!DOCTYPE html>
<html>
<head>
<title>Hi</title>
</head>
<body>
  <style>


  @font-face{
   font-family:  'THSarabunNew';
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
   src: url("fonts/THSarabunNew BoldItalic.ttf") format('truetype');
  }

  body{
   font-family: "THSarabunNew";
  }
  .page-break {
      page-break-after: always;


}
</style>



<h1>Welcome to My BLOG - {{ $title }}</h1>
<div class="main">
  <div class="namep">Jonathan Neal
    <img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png">
<span>
  101 E. Chapman Ave
  Orange, CA 92866

  (800) 555-1234
  </span>

  </div>
  <div class="logop">
  </div>
</div>



<?php
$i=1;
for($i=1;$i<10;$i++){
?>

<div class="page-break"></div>

<!-- Einfügen in den content-Bereich der Seite -->



<?php } ?>

</body>
</html>
