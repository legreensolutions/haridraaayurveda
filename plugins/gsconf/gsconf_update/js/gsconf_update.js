function delete_conf(){
    var ans = confirm("This will delete Configuration Permanently");
    if ( ans == true )
        return true;
    else
        return false;
}