<!DOCTYPE html>
<html>
<head>
<title>Hi</title>
</head>
<body>
  <style>


  /* Einfügen in die css-Datei */



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
<h1>Page 1</h1>
<div class="page-break"></div>
<h1>Page 2</h1>



<h1>Welcome to My BLOG - {{ $title }}</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<?php
$i=1;
for($i=1;$i<100;$i++){
?>

<div class="page-break"></div>

<!-- Einfügen in den content-Bereich der Seite -->
<table class="image-table">
 <tbody>
  <tr>
   <td>
    <img src="https://unsplash.it/g/250/200?image=0" alt="Bild1" title="Bild1">
   </td>
   <td>
    <img src="" alt="Bild2" title="Bild2">
   </td>
   <td>
    <img src="" alt="Bild3" title="Bild3">
   </td>
  </tr>
 </tbody>
</table>

<?php } ?>

</body>
</html>
