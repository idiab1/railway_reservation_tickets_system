
let typeItems = document.querySelectorAll(".type-item");
typeItems.forEach(typeItem => {
    typeItem.addEventListener("click", (e) => {
        e.preventDefault();

        // Get data-url
        let url = typeItem.getAttribute("data-url");
        let method = typeItem.getAttribute("data-method");

        // Change loading spinner to flex
        document.querySelector(".loading").style.display = "flex";

        $.ajax({
            url: url,
            method: method,
            success: function(data){
                // console.log(data)

                // Display none on loading element
                document.querySelector(".loading").style.display = "none";
                // Clear data of all elements
                document.querySelector(".tickets-content-list").innerHTML = "";

                document.querySelector(".tickets-content-list").insertAdjacentHTML("beforeend", data)

            }
        })

        let elmsChecked = document.querySelectorAll("input[type='checkbox']");
        
        elmsChecked.forEach(el => {
            el.removeAttribute("disabled");
            el.removeAttribute("checked");
        })

        // e.target.classList.add("active")
        e.target.setAttribute("disabled", "")
        e.target.setAttribute("checked", "")

        // Change name of heading page
        let pageHeading = document.querySelector(".heading");
        pageHeading.textContent = e.target.parentElement.children[1].textContent + " Tickets"

        console.log(e.target);

        
    })
});

// Click on all types when window loaded
window.addEventListener("load", () => {
    document.querySelector(".all-types").click();
})


document.querySelector(".all-types").addEventListener("click", (e) => {
    e.preventDefault();

    // Get data-url
    let url = document.querySelector(".all-types").getAttribute("data-url");
    let method = document.querySelector(".all-types").getAttribute("data-method");

    // Change loading spinner to flex
    document.querySelector(".loading").style.display = "flex";


    $.ajax({
        url: url,
        method: method,
        success: function(data){
            // console.log(data)

            // Display none on loading element
            document.querySelector(".loading").style.display = "none";
            // Clear data of all elements
            document.querySelector(".tickets-content-list").innerHTML = "";

            document.querySelector(".tickets-content-list").insertAdjacentHTML("beforeend", data)

        }
    })

    let elmsChecked = document.querySelectorAll("input[type='checkbox']");
        
    elmsChecked.forEach(el => {
        el.removeAttribute("disabled");
        el.removeAttribute("checked");
    })

    // e.target.classList.add("active")
    e.target.setAttribute("disabled", "")
    e.target.setAttribute("checked", "")

    // Change name of heading page
    let pageHeading = document.querySelector(".heading");

    pageHeading.textContent = e.target.parentElement.children[1].textContent + " Tickets"
});



