<div class="row">
	<div class="input-field col s12">
    <select id="selectcategory" onchange="redirectToCategories()">
      <option value="" disabled selected>Escolhe uma categoria</option>
	  @foreach($categories as $category)
	  	<option value="{{$category->id}}">{{$category->name}}</option>
	  @endforeach
    </select>
    <label>Categoria de produtos</label>
  </div>
    </div>
    
    <script>
        $(document).ready(function(){
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});
        });
	function redirectToCategories(){
		console.log($('#selectcategory').val());
		let idCategory = $('#selectcategory').val()
		if (idCategory!="") {
			location.href = "/category/"+idCategory
		}
	}
</script>