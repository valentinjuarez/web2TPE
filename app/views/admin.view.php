<?php

class adminView
{
    public function showAdmin()
    {
        require './templates/admin.phtml';
    }
    function showItemsAdmin($data)
    {
        require './templates/listProductAdmin.phtml';
    }
    function showInsertItems(){
        require './templates/insertItemAdmin.phtml';
    }
}
