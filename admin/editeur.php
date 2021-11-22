<head >
	<link rel="stylesheet" href="css/wbbtheme.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/jquery.wysibb.min.js"></script>
<script src="js/jquery.wysibb.fr.js"></script>
<script>
$(function() {
  var optionsWbb = {
   buttons: "bold,italic,underline,|,justifycenter,|,img,link,|,code,quote,monbouton",
   lang: "fr",
   allButtons: {
       monbouton: {
         title: 'Bouton Custom',
         buttonText: 'MON BOUTON',
         transform: {
           '<div class="maclasscustom">{SELTEXT}</div>':'[monbouton]{SELTEXT}[/monbouton]'
         }
       }
   }
  }
  $("#wysibb").wysibb(optionsWbb);
})
</script>
</head>

<body>
	
	<textarea id="wysibb"></textarea>
</body>