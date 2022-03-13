<!DOCTYPE html>
<html>
<head>
<title>CV Mebel Karya Utama</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
</head>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Tutup Menu</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Produk Jadi</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Kustom</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16">Login</div>
    <div class="w3-center w3-padding-16"> <img src="/images/a.png" alt="" height="50" width="50"  > CV Mebel Karya Utama</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">

      @if ( $items )
        @foreach ( $items as $item )
    <div class="w3-quarter">
      <img src="{{ asset("storage/$item->image") }}" alt="{{ $item->name }}" style="width:80%">
      <h3>{{ $item->name }}</h3>
      <p>@if ($item->description) {!! \Illuminate\Support\Str::limit($item->description, 100, $end='...') !!} @endif</p>
      <button class="w3-button w3-white w3-border w3-border-red w3-round-large">BELI</button>
      <hr>
    </div>
		  	@endforeach
		 	@endif
  </div>
  

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      {{ $items->links() }}
      <!-- <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a> -->
    </div>
  </div>
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <h3>Kustom Ukuran</h3><br>
    <div class="w3-padding-32">
      <form class="w3-container">

        <label class="w3-text-dark"><b>First Name</b></label>
        <input class="w3-input w3-border" type="text">

        <label class="w3-text-dark"><b>First Name</b></label>
        <input class="w3-input w3-border" type="text">
        
        <label class="w3-text-bldarkue"><b>Last Name</b></label>
        <input class="w3-input w3-border" type="text">

      <button class="w3-btn w3-dark">Register</button>
      
      </form>
    </div>
  </div>
  <hr>
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-container w3-padding w3-center" >
      <h5>Hak Cipta CV Mebel Karya Utama</h5>
    </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
