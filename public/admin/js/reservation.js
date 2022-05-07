let showBtns = document.querySelectorAll(".btn-show");
showBtns.forEach(showBtn => {
    showBtn.addEventListener("click", (e) => {
        e.preventDefault();

        // Get URL
        let url = showBtn.getAttribute("data-url");
        // Get Method
        let method = showBtn.getAttribute("data-method");

        console.log(url);
        console.log(method);
        // Change loading spinner to display flex
        document.querySelector(".loading").style.display = "flex";


        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }   
        // });

        $.ajax({
            url: url,
            method: method,
            success: function(data){

                console.log(data)

                // Display none on loading element
                document.querySelector(".loading").style.display = "none";

                // Clear data of all elements
                document.querySelector('.reserve-content-list').innerHTML = "";

                // Add Data to order list
                document.querySelector('.reserve-content-list').insertAdjacentHTML("beforeend", data)
            },error: function(xhr, ajaxOptions, thrownError){
                console.log(xhr.status+" ,"+" "+ajaxOptions+", "+thrownError);
            }

        });




    })
});