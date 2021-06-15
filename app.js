function validateform()
{
    var uname=document.getElementById("name").value;

    if(uname=="")
    {
        document.getElementsByClassName("errormsg[0]").innerHTML="Please Enter Name";
        retrun false;
    }
    return true;
}
