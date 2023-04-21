// search header
function myFunction() {

    const input = document.getElementById("myInput");

    const filter = input.value.toUpperCase();

    const myUL = document.getElementById("myUL");

    const li = myUL.getElementsByTagName("li");

    for (i = 0; i < li.length; i++) 
    {
        const a = li[i].getElementsByTagName("a")[0];
        const txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) 
        {
            li[i].style.display = "";
        } 
        else 
        {
            li[i].style.display = "none";
        }
    }
}

//search groups member
function inputMember() {

    const inputMember = document.getElementById("input_member");

    const filters = inputMember.value.toUpperCase();

    const ulMember = document.getElementById("ul_member");

    const lis = ulMember.getElementsByTagName("li");

    for (i = 0; i < lis.length; i++) 
    {
        const div = lis[i].getElementsByTagName("div")[0];
        const txtValues = div.textContent || div.innerText;
        if (txtValues.toUpperCase().indexOf(filters) > -1) 
        {
            lis[i].style.display = "";
        } 
        else 
        {
            lis[i].style.display = "none";
        }
    }
}


//search  groups add friends
function inputAddFriends() {

    const inputMember = document.getElementById("input_add_friends");

    const filters = inputMember.value.toUpperCase();

    const uladdMember = document.getElementById("ul_add_member");

    const liadd = uladdMember.getElementsByTagName("li");

    for (i = 0; i < liadd.length; i++) 
    {
        const div = liadd[i].getElementsByTagName("div")[0];
        const txtValues = div.textContent || div.innerText;
        if (txtValues.toUpperCase().indexOf(filters) > -1) 
        {
            liadd[i].style.display = "";
        } 
        else 
        {
            liadd[i].style.display = "none";
        }
    }
}