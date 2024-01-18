<!-- <x-layout>
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 col-md-4 ">
          <div class="alert" id="response"></div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">New Product</h3>
                    <form id="add_data">
                        @csrf
                        <label for="p_name" class="form-label mt-2">Product Name</label>
                        <input type="text" name="p_name" id="_name" class="form-control">
                        <label for="p_image" class="form-label mt-2">Product Image</label>
                        <input type="file" name="p_image" id="p_image" class="form-control">
                        <label for="p_price" class="form-label mt-2">Product Price</label>
                        <input type="number" name="p_price" id="p_price" class="form-control">
                        <label for="p_description" class="form-label mt-2">Product Description</label>
                        <textarea name="p_description" id="p_description" cols="" rows="4" class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-2" id="savebtns">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 mt-2">
            <table class="table table-bordered rounded">
                <thead class="table-success">
                  <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody id="load_table">
                </tbody>
              </table>
        </div>
        </div>
            <!-- The Modal -->
            <!-- <div class="modal" id="myModal"> -->
          <!-- <div class="modal-dialog"> -->
            <!-- <div class="modal-content"> -->
<!--          -->
              Modal Header
              <!-- <div class="modal-header"> -->
                <!-- <h4 class="modal-title">Modal Heading</h4> -->
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
              <!-- </div> -->
<!--          -->
              Modal body
              <!-- <div class="modal-body"> -->
                <!-- <div class="card"> -->
                  <!-- <div class="card-body"> -->
                      <!-- <h3 class="card-title text-center">Information Form</h3> -->
                      <!-- <form id="edit_form"> -->
                          <!-- <label for="p_eid" class="form-label">Product id</label> -->
                          <!-- <input type="text" class="form-control" name="p_eid" id="p_eid" readonly> -->
                          <!-- <label for="p_ename" class="form-label mt-2">Product Name</label> -->
                          <!-- <input type="text" name="p_ename" id="p_ename" class="form-control"> -->
                          <!-- <label for="p_eimage" class="form-label mt-2">Product Image</label> -->
                          <!-- <input type="file" name="p_eimage" id="p_eimage" class="form-control"> -->
                          <!-- <label for="p_eprice" class="form-label mt-2">Product Price</label> -->
                          <!-- <input type="number" name="p_eprice" id="p_eprice" class="form-control"> -->
                          <!-- <label for="p_edescription" class="form-label mt-2">Product Description</label> -->
                          <!-- <textarea name="p_edescription" id="p_edescription" cols="" rows="4" class="form-control"></textarea> -->
                          <!-- <button type="submit" data-bs-dismiss="modal" class="btn btn-primary mt-2" id="editsave" >Save</button> -->
                      <!-- </form> -->
                  <!-- </div> -->
              <!-- </div> -->
              <!-- </div> -->
<!--          -->
              Modal footer
              <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
              <!-- </div> -->
<!--          -->
            <!-- </div> -->
          <!-- </div> -->
        <!-- </div> -->
    <!-- <Script> -->
        // $(document).ready(function(){
            fetch all record
          // function loadtable(){
            // $("#load_table").html("");
            // $.ajax({
              // url : 'http://127.0.0.1:8000/api/product',
              // type : "GET",
              // success : function(data){
               console.log(data.data);
                // if(data.status == false){
                  // $("#load_table").append("<tr><td><p>"+ data.data.message +"</p></td></tr>")
                // }else{
                  // $.each(data.data, function(key, value){
                    // $("#load_table").append("<tr>"+
                                        // "<td>"+ value.id +"</td>"+
                                        // "<td>"+ value.product_name +"</td>"+
                                        // // "<td><img src='productImage/"+ value.product_image +"' alt='product image' width='50px' height='50px' class='rounded'></td>"+
                                        // "<td>"+ value.product_price +"</td>"+
                                        // "<td>"+ value.product_description +"</td>"+
                                        // "<td>"+
                                          // // '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" id="edit" value='+ value.id +'> Edit </button>' +"</td><td>"+
                                          // '<button type="button" class="btn btn-danger" id="delete" data-did='+ value.id +'> Delete </button>'+
                                        // "</td>"+
                                      // "</tr>");
                  // });
                // }
              // }
            // });
          // }
          // loadtable();
          fetch single data for update
          // $(document).on("click", "#edit", function(e){
            // e.preventDefault();
            // var productid=$(this).val();
            // $.ajax({
              // url : 'http://127.0.0.1:8000/api/product_edit/'+productid,
              // type : "GET",
              // success : function(data){
                // if(data.status==false){
                    // message(data.data.message);
                // }else{
                    // console.log(data.data.id);
                    // $("#p_eid").val(data.data.id);
                    // $("#p_ename").val(data.data.product_name);
                    $("#p_eimage").val(data.data.product_image);
                    // $("#p_eprice").val(data.data.product_price);
                    // $("#p_edescription").val(data.data.product_description);
                // }
              // }
            // });
          // });
// 
          update form data
          // $("#edit").on("click", function(e){
            // e.preventDefault();
            // var id=$("#p_eid").val();
            // var jsonobj=jsondata("#edit_form");
            // if(jsonobj==false){
              // alert("All fields are required");
            // 
            // }else{
              // $.ajax({
                // url : 'http://127.0.0.1:8000/api/product_update',
                // type : "POST",
                // data : ,
                // success : function(data){
                  // if(data.status==true){
                    // loadtable();
// 
                  // }
                // } 
              // });
            // }
          // });
          delete data
// 
          // $(document).on("click","#delete", function(){
            // if(confirm("Do you really want to delete this record?")){
              // var productid=$(this).data("did");
              // console.log(productid);
              // $.ajax({
                // url : 'http://127.0.0.1:8000/api/product_delete'+productid,
                // type : "DELETE",
                // data : "JSON",
                // success : function(data){
                  // if(data.status==true){
                    // $("#load_table").closest("tr").fadeOut();
                  // }
                // }
              // });
            // }
          // });
// 
          Insert new record
          // $("#savebtns").on("click", function(e){
            // e.preventDefault();
            // var all_data=$("#add_data").serialize();
            // $.ajax({
              // url : "http://127.0.0.1:8000/api/product_store",
              // type : "POST",
              // data : all_data,
              // success : function(data){
                // console.log(data);
                // loadtable();
                // $("#add_data").trigger("reset");
              // }
            // });
          // });
        // });
    // </Script>
<!-- </x-layout> --> -->