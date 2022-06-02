<script>
       <!--
       try{
       function PrintDiv() {    
         var divToPrint = document.getElementById('printableArea');
         var popupWin = window.open('', '_blank', 'width=800,height=400');
         popupWin.document.open();
         popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
         popupWin.document.close();
       }
            
       loc=location.pathname;
       if (loc.toUpperCase().indexOf(".html")<0) loc=loc+"";
       txt='<ul id="sharelist" class="d-flex justify-content-between mb-0">';
       txt=txt+'<li class="roundedcircle" id="print"><a onclick="PrintDiv();" href="#none" target="_blank" data-toggle="tooltip" rel="tooltip" title="Print This Article"><i class="fas fa-print fa-lg"></i></a></li>';
       txt=txt+'<li class="roundedcircle" id="facebook"><a href="http://www.facebook.com/sharer.php?u=http://mohammadmohsin.altervista.org'+loc+'" target="_blank" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook-f fa-lg"></i></a></li>';
       txt=txt+'<li class="roundedcircle" id="twitter"><a href="http://twitter.com/home?status=Currently reading http://mohammadmohsin.altervista.org'+loc+'" target="_blank" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter fa-lg"></i></a></li>';
       txt=txt+'<li class="roundedcircle" id="googleplus"><a href="https://plus.google.com/share?url=http://mohammadmohsin.altervista.org'+loc+'" target="_blank" data-toggle="tooltip" title="Google+"><i class="fab fa-google-plus-g fa-lg"></i></a></li>';
       txt=txt+'</ul>';
       document.write(txt);
       }
       catch(e) {}
       //-->
</script>
