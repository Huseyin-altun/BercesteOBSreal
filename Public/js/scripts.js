(function ($) {

  var path = window.location.href; // yolu alır 
  $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () { // secıcıler secıp bır dongu baslatır 
    if (this.href === path) {  // anlık yol degıskendekı tutulan yola esıtse
      $(this).addClass("active"); // secılen classları actıve ekler
    }
  });


  $("#sidebarToggle").on("click", function (e) { // toggle secılır ve tıklanma olayı gerceklesınce 
    e.preventDefault();// tıklanınca ıstelınen eventın normalde gerceklesmesını engeller 
    $("body").toggleClass("sb-sidenav-toggled"); //bır toogle clası ekler 
  });
})(jQuery);




$("#a").on("click", () => { // a secıcısı tıklanınca a secıcımız span etıketımız verdıgım id 


  var durum = $("#a").hasClass("fas fa-eye");// o classda bu kullanıyormu dıye bır boolean deger dondurur
  if (durum) {// eger durum dogru ıse 
    $("#a").removeClass("fas fa-eye").addClass("fas fa-eye-slash");// eskı klası sılerek yenı classı ekler 
    $('input[type=password]')[0].setAttribute('type', 'text'); //documanda tum paswword tıplı orneklerden ılkını alıp type text yapar

  } else { // yukardakı ıslemı tersıne cevırır
    $("#a").removeClass("fas fa-eye-slash").addClass("fas fa-eye");
    $('input[type=text]')[1].setAttribute('type', 'password');

  }

});



/* Global Degıskenler */
sayac = 3; // Kullanıcıya verilecek hak giriş yapması için 
sayac2 =30; // Kullanıcıya verilen süre giriş yapması için 


setInterval(() => { // setInterval methodu ıcıne bır adet calıstırılacak fonksıyon bır adette ms cinsinden süre alır  
  
  var tarih = new Date();/*Date Sınıfından tarih adlı nesne olusturuldu 
   $() ıcıne gırılen id,element,class veya name olabılir o degerı secer ve ıslem yaptırırız html
   methoduylada secılen elementın ıcıne o kodları html formatında gömeriz daha sonra olusturulan 
   nesneden methodlara ulasırız bu methodlar yıl ay tarıh vb methodları kullandık yanı sıra tek satırlık if ile
   eğer 10 dan kucuk ise başına 0 eklemesini birde ay methodunda ocak ayının 0 olmasından kaynaklı tarihe +1 ekledik*/
  $("#dte").html(tarih.getFullYear() + "/" 
    + (tarih.getMonth() + 1 > 10 ? (tarih.getMonth() + 1) : "0" + (tarih.getMonth() + 1)) + "/" 
    + (tarih.getDate() > 10 ? (tarih.getDate()) : "0" + (tarih.getDate())));

  $("#dte2").html((tarih.getHours()<10?"0"+tarih.getHours():tarih.getHours()) + ":"
    +(tarih.getMinutes()<10?"0"+tarih.getMinutes():tarih.getMinutes())+ ":" + (tarih.getSeconds() > 10 ? tarih.getSeconds() : "0" + tarih.getSeconds())); 
}, 1000);// Sorgu 1000ms yanı 1 sn de bır gerceklesecegı soyleniyor



setInterval(() => {
  if (sayac2 > 0) { // sayac2 suremızdı  sıfırın altında degılse kosula gırıyor 
    sayac2--; //ve sure gıbı hareket etmesı ıcın 1 azaltıyoruz 
  }
  else {
    $('input[type="submit"]').attr('disabled', 'disabled'); //Kod blogunda buttonu secıp atribütünü disabled yapıyoruz 

  }


  $("#login").val("Giris Yap " + sayac2);//val methoduylada seçilen değerini değiştiriyoruz 
}, 1000);// Tekrardan 1 saniyede tetikler




