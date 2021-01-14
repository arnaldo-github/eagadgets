

<div class="banner">
    <div class="banner-content">
      <h1>Bem Vindo a <br> <span style="color: rgb(68, 37, 111);">EA Gadgets</span></h1>

      <p><span class="shopping-cart material-icons">
          shopping_cart
        </span> <span class="add-task material-icons">
          add_task
        </span></p>
      <nav class="search-box nav-search hide-on-small-only">
        <div class="nav-wrapper">
          <form action="{{route('search.all.products')}}" method="GET">
            <div class="input-field">
              <input id="searchB" name="searchText" type="search" placeholder="Pesquise por produtos" required>
              <label class="label-icon" for="searchB"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
            </div>
          
        </div>
      </nav>
      <button style="background-color:rgb(252, 153, 114) !important;margin-top:20px; border-radius: 13px;"
        class="btn hide-on-small-only">Pesquisar</button>
    </div>
    </form>
  </div>
  <script>
   
   $( document ).ready(function() {
     $( "#searchB" ).focus(function() {

       fbq('track', 'Search');
   });
     
   });
    </script>