/*Validation for Adding book*/
//function validate_add_document(f)
//{
//    if(f.title.value=="" && f.tags.value=="" && f.tags.value=="" && f.description.value=="" && f.author.value==""){
//        alert("All the fields can't be empty!!");
//        return false;
//    }
//    return true;
//}

function agreement_add_document()
{
    if(document.add_document.agree.checked==true)
    {
        document.add_document.btn.disabled=false;
    }
    else
    {
        document.add_document.btn.disabled=true;
    }
}

function agreement_remove_document()
{
    if(document.remove_document.agree.checked==true)
    {
        document.remove_document.btn.disabled=false;
    }
    else
    {
        document.remove_document.btn.disabled=true;
    }
}

//------------------------------------------------


/*Manager login*/
//function validate_manager(f)
//{
//    if(f.mgr.value=="" || f.mgr.value.length<6)
//    {
//        f.mgr.value="";
//        alert("Invalid manager name!");
//        return false;
//    }
//
//    if(f.pwd.value=="" || f.pwd.length<6)
//    {
//        f.pwd.value="";
//        alert("Invalid password!");
//        return false;
//    }
////    return true;
//}

/*Add manager validation*/
//function validate_add_manager(f)
//{
//    if(f.mgr_name.value=="" || f.mgr_name.value.length<6)
//    {
//        f.mgr_name.value="";
//        alert("Invalid manager name!");
//        return false;
//    }
//
//    if(f.mgr_pwd.value=="" || f.mgr_pwd.length<6)
//    {
//        f.mgr_pwd.value="";
//        alert("Invalid password!");
//        return false;
//    }
//    return true;
//}

/*validation for remove manager*/
function agreement_remove_manager()
{
    if(document.remove_manager.agree.checked==true)
    {
        document.remove_manager.btn.disabled=false;
    }
    else
    {
        document.remove_manager.btn.disabled=true;
    }
}
//-----------------------------------------------------