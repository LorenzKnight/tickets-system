// var url ="Evanstón, IN 47531, USA fkvgjííííúúuúúú";
// document.write(ToSeoUrl(url));
  
function codificarSEO(url) {
        
  var encodedUrl = url.toString().toLowerCase(); 
  
  encodedUrl = encodedUrl.replace(/á/g, "a");
  encodedUrl = encodedUrl.replace(/é/g, "e");
  encodedUrl = encodedUrl.replace(/í/g, "i");
  encodedUrl = encodedUrl.replace(/ó/g, "o");
  encodedUrl = encodedUrl.replace(/ú/g, "u");
  encodedUrl = encodedUrl.replace(/ñ/g, "n");
  encodedUrl = encodedUrl.replace(/,/g, "-");

  encodedUrl = encodedUrl.split(/\&+/).join("-")
  encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");       
  encodedUrl = encodedUrl.split(/-+/).join("-");
  encodedUrl = encodedUrl.trim('-'); 

  //alert (encodedUrl);
  return encodedUrl; 
}