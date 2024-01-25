$("#addCategoryBtn").click(function(){
    $("#categoryName").val("");
    $("#modalH1").text('ADD CATEGORY');
    $("#addCategorySubmitBtn").text('ADD CATEGORY');
    $("#categoryAdd").modal('show');
 });


 const showCategoryDataOnTable = (data) => {
    const tbody = $("#categoryTableBody");

    tbody.empty();

    data.forEach((category, index) => {
        const row = `<tr>
                        <th scope="row">${index + 1}</th>
                        <td>${category.name}</td>
                        <td>
                        <button value="${category?.id}" class="btn btn btn-md btn-primary" onclick="editCategory(event)"> <i class="fa-regular fa-pen-to-square"></i></button>
                        <button value="${category?.id}" class="btn btn btn-md btn-danger" onclick="deleteCategory(event)"><i class="fa-solid fa-trash"></i></button>
                        </td>
                        
                    </tr>`;

        tbody.append(row);
    });
};

 const getCategoryData = () =>{
    $.ajax({
        url: "/all-category",
        type: "GET",
        success: function (res) {
            console.log("GET ALL CATEGORY ",res);
            if (res.status === "success") {
                let data = res.allCategory;
                showCategoryDataOnTable(data);
            }
        },
    });
 }

 getCategoryData();
 
 //add and update task is one function start here 
 $("#addCategorySubmitBtn").click(function(e){
   
    let categoryName = $("#categoryName").val();
    let btnValue = e.currentTarget.innerText;
    // console.log("Check btn text",btnValue);
    if(btnValue ==="ADD CATEGORY"){
        if (categoryName) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
    
            $.ajax({
                url: "/category/store",
                type: "POST",
                data: { categoryName: categoryName },
                success: function (response) {
                    // console.log("submit form data == : ", response);
    
                    if (response.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Category Added',
                            text: 'The Category has been successfully added.',
                            timer: 5000,
                            showConfirmButton: true
                        });
                        $("#categoryAdd").modal('hide');
                        getCategoryData();
                        
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Error: ", error);
                    var response = JSON.parse(xhr.responseText);
                    console.log("Error Message: ", response.message);
                },
            });
        } else {
            alert("Category name is undefined or empty.");
        }
    }

    if(btnValue ==="UPDATE CATEGORY"){
        let id = e.currentTarget.value;
        let categoryName = $("#categoryName").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: "/category/update/"+id,
            type: "PUT",
            data: { categoryName: categoryName },
            success: function (response) {
                // console.log("submit form data == : ", response);

                if (response.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Category Update',
                        text: 'The Category has been successfully updated.',
                        timer: 5000,
                        showConfirmButton: true
                    });
                    $("#categoryAdd").modal('hide');
                    getCategoryData();
                    
                }
            },
            error: function (xhr, status, error) {
                console.log("Error: ", error);
                var response = JSON.parse(xhr.responseText);
                console.log("Error Message: ", response.message);
            },
        });
    }

   
    
});
 //add and update task is one function end here 


const editCategory = (e) => {
    $("#categoryAdd").modal('show');
    $("#modalH1").text('EDIT CATEGORY');
    $("#addCategorySubmitBtn").text('UPDATE CATEGORY');

    let id = e.currentTarget.value;
    console.log("EDIT PRODUCT",id);
    $.ajax({
        url: "/category/edit/"+id,
        type: "GET",
        success: function (res) {

            if (res.status === "success") {
                // console.log("DATA EDIT == ",res);

                $("#categoryName").val(res.category .name)
               $("#addCategorySubmitBtn").val(res.category.id)

            }
        },
    });


    

}


const deleteCategory=(e)=>{
    let id = e.currentTarget.value;
    // console.log("delete id",id);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/category/delete/"+id,
                type: "GET",
                success: function (res) {
                    if (res.status === "success") {

                        Swal.fire({
                            title:"Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                          });
                          getCategoryData();
                    }
                },
            });

        }



      });
}

 