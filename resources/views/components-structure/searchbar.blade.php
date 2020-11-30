<nav class="search-box-all container nav-search-product ">
    <div class="nav-wrapper">
      <form action="{{route('search.all.products')}}" method="GET">
        <div class="input-field">
          <input id="search" name="searchText" type="search" placeholder="@yield('placeholder', 'Pesquise por produtos')" required>
          <label  class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
